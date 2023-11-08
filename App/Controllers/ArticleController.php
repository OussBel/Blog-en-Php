<?php

/**
 * The ArticleController class is responsible for handling requests related to articles.
 * It extends the View class which allows it to render views using Twig.
 * PHP 8.0
 *
 */

declare (strict_types=1);

namespace App\Controllers;

use App\FileHandler\FileHandler;
use App\Helpers\Url;
use App\Models\ArticleManager;
use App\Models\CategoryManager;
use App\Models\CommentManager;
use App\Validators\ArticleValidator;

class ArticleController extends \Core\View
{

    private ArticleManager $articleManager;
    private CategoryManager $categoryManager;
    private CommentManager $commentsManager;
    public array $errors = [];

    private CommentController $commentController;

    /**
     * Constructor. Initializes the article, category, and comment managers.
     *
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->categoryManager = new CategoryManager();
        $this->commentsManager = new CommentManager();
        $this->commentController = new CommentController();
    }

    /**
     * Renders the index page of the article section, showing all articles.
     * The list of articles is passed to the template as the 'articles' variable.
     * @return void
     */

    public function index(): void
    {

        $articles = $this->articleManager->getAll();

        parent::renderTemplate('articles.html.twig', ["articles" => $articles]);
    }

    /**
     * Renders the page for a specific article, including its comments.
     *
     * @param int $id The ID of the article to display
     *
     * @return void
     */

    public function show(int $id): void
    {

        $article = $this->articleManager->getById($id);
        if (!$article) {
            Url::redirect('/article/index');
        }

        $comments = $this->commentsManager->getComments($id, true);

        // Add a comment, available only for logged-in members.

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $content = $_POST['content'];

            if (empty($content)) {
                $this->errors[] = 'Veuillez remplir le contenu.';
            } elseif ($this->commentController->addComment($id, $content)) {
                Url::redirect("/article/show/$id");
            } else {
                $this->errors[] = "Une erreur est survenue, veuillez réessayer plus tard.";
            }

        }

        parent::renderTemplate('article.html.twig', [
            "article" => $article,
            "comments" => $comments,
            "errors" => $this->errors,
        ]);
    }

    /**
     * Renders the form for adding a new article.
     * If the user is not logged in, they are redirected to the login page.
     * The form includes the article and category managers, as well as
     * any errors encountered during form handling.
     * @return void
     */

    public function add(): void
    {
        LoginController::requireLogin();

        $article = $this->articleManager;
        $categories = $this->categoryManager->getCategories();

        $this->handleForm($article);
        $this->render($article, $categories, $this->errors);
    }

    /**
     * Renders the form for editing an existing article.
     * If the user is not logged in or is not the author of the article, they are redirected to the login page.
     * The form includes the article and category managers, as well as any errors encountered during form handling.
     *
     * @param int $id The ID of the article to edit
     * @return void
     */

    public function update(int $id): void
    {
        LoginController::requireLogin();

        $article = $this->articleManager->getById($id);

        if (!$article) {
            Url::redirect('/article/index');
        }

        // Checks whether the logged-in user is the author of a given article,
        //  and redirects to the article index page if not.
        LoginController::auth($article);

        $categories = $this->categoryManager->getCategories();

        $this->handleForm($article, $id);
        $this->render($article, $categories, $this->errors);

    }

    /**
     * Display confirmDelete page
     *
     * @param int $id of the article
     *
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        LoginController::requireLogin();

        parent::renderTemplate('confirmDelete.html.twig', ['id' => $id]);
    }

    /**
     * Delete an article using its ID
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        LoginController::requireLogin();

        $article = $this->articleManager->getById($id);

        // Checks whether the logged-in user is the author of a given article,
        //  and redirects to the article index page if not.
        LoginController::auth($article);

        if ($article->delete($id)) {
            file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article->img) &&
            unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article->img);

            Url::redirect("/article/index");
        }
    }

    /**
     * Delete an article image
     *
     * @param int $id
     * @return void
     */
    public function deleteImage(int $id): void
    {
        $article = $this->articleManager->getById($id);

        // Checks whether the logged-in user is the author of a given article,
        //  and redirects to the article index page if not.
        LoginController::auth($article);

        if ($article->deleteImage($id)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article->img);

            Url::redirect("/article/update/$id");
        }
    }

    private function handleForm(object $article, int $id = null): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }

        $article->title = $_POST['title'];
        $article->subtitle = $_POST['subtitle'];
        $article->content = $_POST['content'];
        $article->category_id = $_POST['category_id'];

        // Validate the input of the form

        $errors = ArticleValidator::validateForm($article, []);
        $invalid = implode($errors);

        if (!empty($invalid)) {
            $this->errors = $errors;
            return;
        }

        $previous_img = $article->img;

        if (!empty($_FILES['image']['name'])) {
            $article->img = FileHandler::createFilename($_FILES['image']['name']);

            is_file($_SERVER['DOCUMENT_ROOT'] . "/images/" . $previous_img) &&
            unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $previous_img);
        }

        $result = $id ? $article->update() : $article->add();

        if ($result) {
            FileHandler::addImage($_SERVER['DOCUMENT_ROOT'] . "/images/");
            Url::redirect("/article/show/$article->id");
        }
    }

    private function render(object $article, array $categories, array $errors): void
    {
        parent::renderTemplate('form.html.twig', [
            'article' => $article,
            'categories' => $categories,
            'errors' => $errors ?? [],
        ]);
    }

}
