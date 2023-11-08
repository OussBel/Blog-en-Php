<?php
declare (strict_types = 1);

namespace App\Controllers;

use App\Helpers\Url;
use App\Models\ArticleManager;
use App\Models\CommentManager;

/**
 * Class CommentController
 *
 * This class handles comments.
 */
class CommentController extends \Core\View
{

    private CommentManager $commentManager;
    private ArticleManager $articleManager;

    /**
     * This contruct initializes the commentManager and the articleManager
     */
    public function __construct() {
        $this->commentManager = new CommentManager();
        $this->articleManager = new ArticleManager();
    }

    /**
     * Add a new comment.
     *
     * @param int $article_id The ID of the article.
     * @param string $content The content of the comment.
     *
     * @return bool Returns true if the comment was added successfully, false otherwise.
     */
    public function addComment($article_id, $content): int {

        LoginController::requireLogin();

        return $this->commentManager->add($content, $article_id);
    }

    /**
     * Update a comment.
     *
     * @param int $comment_id The ID of the comment.
     *
     * @return void
     */
    public function updateComment($comment_id) {
        $error = '';
        $comment = $this->commentManager->getComment($comment_id);
        $article_id = $comment->article_id;
        $content = $comment->content;

        LoginController::auth($comment);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = $_POST['content'];

            if (empty(trim($content))) {
                $error = "Veuillez ajouter un commentaire";
            } else {

                if ($this->commentManager->update($content, $comment_id)) {
                    Url::redirect("/article/show/$article_id");
                } else {
                    $error = 'Une erreur est survenue, veuillez réessayer plus tard.';
                }
            }
        }

        parent::renderTemplate('commentForm.html.twig', [
            'error'   => $error,
            'content' => $content,
        ]);
    }

    /**
     * Delete a comment.
     *
     * @param int $comment_id The ID of the comment.
     *
     * @return void
     */
    public function deleteComment($comment_id) {

        $comment = $this->commentManager->getComment($comment_id);
        $article_id = $comment->article_id;
        LoginController::auth($comment);

        if ($this->commentManager->delete($comment_id)) {
            Url::redirect("/article/show/$article_id");
        }
    }
}
