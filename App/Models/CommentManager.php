<?php
declare (strict_types = 1);

namespace App\Models;

use Core\DatabaseConnection;
use PDO;

class CommentManager extends DatabaseConnection {

    /**
     * Get comments for a specific article
     *
     * @param int $article_id
     * @param bool $only_published
     * @return array|false
     */
    public function getComments($article_id, $only_published = false) {
        $sql = "SELECT c.id, c.content, c.published_at, c.published,
                user.name AS commentator, user.id AS user_id
                FROM comment  AS c
                JOIN user ON user.id = c.user_id";

        if ($only_published) {
            $sql .= " WHERE c.published = 1";
        }

        $sql .= " AND c.article_id = :article_id
        ORDER BY c.published_at ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, CommentManager::class);
    }

    /**
     * Add a new comment
     *
     * @param string $content
     * @param int $article_id
     * @return bool
     */
    public function add($content, $article_id) {
        $sql = "INSERT INTO comment (content, article_id, published_at, user_id)
        VALUES ( :content, :article_id, NOW(), :user_id);";

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $stmt = $this->db->prepare($sql);
        $user_id = $_SESSION['id'];
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Update a comment
     *
     * @param string $content
     * @param int $comment_id
     * @return bool
     */
    public function update($content, $comment_id) {
        $sql = "UPDATE comment
                SET content = :content,
                published_at = NOW()
                WHERE id =:comment_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':comment_id', $comment_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Get a comment by ID
     *
     * @param int $comment_id
     * @return object|false
     */
    public function getComment($comment_id) {
        $sql = "SELECT * FROM comment WHERE id = :comment_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':comment_id' => $comment_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, CommentManager::class);
        return $stmt->fetch();
    }

    /**
     * Delete a comment
     *
     * @param int $comment_id
     * @return bool
     */
    public function delete($comment_id) {
        $sql = "DELETE FROM comment WHERE id =:id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $comment_id]);
        return $stmt->rowCount() > 0;
    }

    /**
     * Publish a comment
     *
     * @param int $comment_id
     * @param int $published
     * @return bool
     */
    public function publish($comment_id, $published) {
        $sql = "UPDATE comment SET published = :published
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $comment_id, 'published' => $published]);
        return $stmt->rowCount() > 0;
    }

}