<?php
declare (strict_types = 1);

namespace App\Controllers\Admin;

use App\Controllers\LoginController;
use App\Helpers\Url;
use App\Models\UserManager;

/**
 * Class UserController
 *
 * This class handles the administration of users.
 */
class UserController extends \Core\View {
    private UserManager $userManager;
    private $error;

    /**
     * UserController constructor.
     *
     * Initializes a new instance of the UserController class.
     */
    public function __construct() {
        $this->userManager = new UserManager();
        LoginController::isAdmin();
    }

    /**
     * Display the list of users in the admin panel.
     *
     * @return void
     */
    public function index() {
        $users = $this->userManager->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $role = $_POST['role'];

            if ($this->userManager->updateRole($id, $role)) {
                Url::redirect('/admin/user/index');
            } else {
                $this->error = "Une erreur est survenue, veuillez réessayer plus tard";
            }
        }

        parent::renderTemplate('userAdmin.html.twig', [
            'users' => $users,
            'error' => $this->error,
        ]);
    }

    /**
     * Validate a user.
     *
     * @return void
     */
    public function validate() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            Url::redirect('/admin/user/validate');
        }
    }
}