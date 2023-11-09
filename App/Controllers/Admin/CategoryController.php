<?php
declare (strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\LoginController;
use App\Helpers\Url;
use App\Models\CategoryManager;

/**
 * Class CategoryController
 *
 * This class handles the administration of categories.
 */
class CategoryController extends \Core\View
{

    private CategoryManager $categoryManager;
    private string $error = '';

    /**
     * CategoryController constructor.
     *
     * Initializes a new instance of the CategoryController class.
     */
    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
        LoginController::isAdmin();
    }

    /**
     * Display the list of categories in the admin panel.
     *
     * @return void
     */
    public function index(): void
    {
        $categories = $this->categoryManager->getCategories();

        parent::renderTemplate('category.html.twig', ['categories' => $categories]);
    }

    /**
     * Add a new category.
     *
     * @return void
     */
    public function add(): void
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category = $_POST['name'];

            if (empty(trim($category))) {
                $this->error = 'Veuillez ajouter un nom';
            } else {
                try {
                    if ($this->categoryManager->add($category)) {
                        Url::redirect("/admin/category/index");
                    }

                } catch (\PDOException $e) {
                    if ($e->errorInfo[1] === 1062) {
                        $this->error = 'nom déjà utilisé, veuillez le modifier';
                    } else {
                        throw $e;
                    }
                }

            }
        }

        parent::renderTemplate('categoryForm.html.twig', ['error' => $this->error]);
    }

    /**
     * Update a category.
     *
     * @param int $id The ID of the category to update.
     * @return void
     */
    public function updateCategory(int $id): void
    {
        $category = $this->categoryManager->getById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category->name = $_POST['name'];

            if (empty(trim($category->name))) {
                $this->error = 'Veuillez ajouter un nom';
            } else {
                try {
                    if ($category->update()) {
                        Url::redirect("/admin/category/index");
                    }
                } catch (\PDOException $e) {
                    if ($e->errorInfo[1] === 1062) {
                        $this->error = 'nom déjà utilisé, veuillez le modifier';
                    } else {
                        throw $e;
                    }
                }
            }
        }

        parent::renderTemplate('categoryForm.html.twig', [
            'category_name' => $category->name ?? '',
            'error' => $this->error,
        ]);
    }

    /**
     * Display a confirmation message for deleting a category.
     *
     * @param int $id The ID of the category to delete.
     * @return void
     */
    public function confirmDeleteCategory(int $id): void
    {
        parent::renderTemplate('confirmDeleteCategory.html.twig', ['id' => $id]);
    }

    /**
     * Delete a category.
     *
     * @param int $id The ID of the category to delete.
     * @return void
     */
    public function deleteCategory(int $id): void
    {
        $category = $this->categoryManager->getById($id);

        if ($category->delete()) {
            Url::redirect('/admin/category/index');
        }
    }
}
