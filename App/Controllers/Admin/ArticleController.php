<?php

declare (strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\LoginController;
use App\Helpers\Url;
use App\Models\ArticleManager;
use App\Models\CommentManager;

/**
 * Class ArticleController
 *
 * This class handles the administration of articles.
 */
class ArticleController extends \Core\View
{

    private ArticleManager $articleManager;
    private CommentManager $commentManager;

    /**
     * ArticleController constructor.
     *
     * Initializes a new instance of the ArticleController class.
     */

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->commentManager = new CommentManager();
        LoginController::isAdmin();
    }

    /**
     * Display the list of articles in the admin panel.
     *
     * @return void
     */
    public function index(): void
    {

        $articles = $this->articleManager->getAll();

        parent::renderTemplate('articlesAdmin.html.twig', ["articles" => $articles]);
    }

    /**
     * Display an individual article and its comments in the admin panel.
     *
     * @param int $id The ID of the article to display.
     * @return void
     */
    public function show(int $id): void
    {

        $article = $this->articleManager->getById($id);
        $comments = $this->commentManager->getComments($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment_id = $_POST['id'];
            $published = $_POST['publish'];

            if ($this->commentManager->publish($comment_id, $published)) {
                Url::redirect("/admin/article/show/$id");
            }
        }

        parent::renderTemplate('articleAdmin.html.twig', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }

}
