<?php
declare (strict_types=1);

namespace App\Models;

use Core\DatabaseConnection;
use mysql_xdevapi\SqlStatement;
use PDO;

/**
 * ArticleManager handles CRUD operations of articles
 */
class ArticleManager extends DatabaseConnection
{

    public int $id = 0;
    public string $title;
    public string $subtitle;
    public string $content;
    public int|null $category_id;
    public string|null $img = null;
    public int $user_id;

    /**
     * Get all the articles
     *
     * @return array if objects
     */

    public function getAll() :array
    {
        $sql = "SELECT id, title, subtitle, content, img, published_at
                FROM article
                WHERE published = 1
                ORDER BY published_at DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, ArticleManager::class);
    }

    /**
     * Get article using its $id
     *
     * @return object|bool
     */

    public function getById(int $id): object|bool
    {

        $sql = "SELECT a.id, a.title, a.subtitle, a.content,
                a.published_at, a.img, a.user_id,
                a.category_id,
                category.name AS category_name, user.name AS author
                FROM article AS a
                LEFT JOIN category ON a.category_id = category.id
                JOIN user ON a.user_id = user.id
                WHERE a.published = 1 AND a.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, ArticleManager::class);
        return $stmt->fetch();

    }

    /**
     * Add an article
     *
     * @return int
     */

    public function add(): int {
        $sql = "INSERT INTO article (title, subtitle, content, published_at, category_id, img, user_id)
                VALUES ( :title, :subtitle, :content, NOW(), :category_id, :img, :user_id);";

        $stmt = $this->save($sql);

        $stmt->execute();
        return $this->id = (int) $this->db->lastInsertId();
    }

    /**
     * Update an article
     *
     * @return bool
     */

    public function update(): bool
    {

        $sql = "UPDATE article
                SET title = :title,
                subtitle = :subtitle,
                content = :content,
                img = :img,
                category_id = :category_id,
                published_at = NOW()
                WHERE article.id = :id";

        $stmt = $this->save($sql);

        $stmt->execute();
        return $stmt->rowCount() > 0;

    }

    private function save(string $sql): bool|\PDOStatement
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->user_id = (int) $_SESSION['id'];
        $stmt = $this->db->prepare($sql);
        $this->id && $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':subtitle', $this->subtitle, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);
        !$this->id && $stmt->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);

        if ($this->img === null) {
            $stmt->bindValue(':img', NULL, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':img', $this->img, PDO::PARAM_STR);
        }

        $stmt->bindValue(':category_id', $this->category_id, PDO::PARAM_INT);

        return $stmt;
    }

    /**
     * Delete an article using its ID
     * @param int $id
     *
     * @return bool
     */

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM article WHERE id =:id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }

    /**
     * Delete image
     *
     * @param int $id
     * @return bool
     */
    public function deleteImage(int $id): bool
    {
        $sql = "UPDATE article SET img = NULL WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount() > 0;
    }
}