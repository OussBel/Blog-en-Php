<?php
declare (strict_types = 1);

namespace App\Controllers;

use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\UserManager as User;
use App\Validators\LoginValidator;

/**
 * Class LoginController handles login and logout
 */
class LoginController extends \Core\View
{
    public $errors = [];
    private User $user;
    private Session $session;

    /**
     * Connstructor initializes the user and the session
     */
    public function __construct() {
        $this->user = new User();
        $this->session = Session::getInstance();
    }

    /**
     * SignIn handles signin
     *
     * @return void
     */
    public function signIn() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->session->csrfToken === $_POST['csrfToken']
        ) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = LoginValidator::validateEmailAndPassword($email, $password);
            $invalid = implode($errors);

            if (empty($invalid)) {
                $member = $this->user->login($email, $password);

                if ($member) {
                    if ($member->role == 'pending') {
                        $this->errors['message'] = 'Compte pas encore validé';
                    } else {
                        $this->session->create($member);
                        Url::redirect("/article/index");
                    }

                } else {
                    $this->errors['message'] = 'Email ou mot de passe incorrect';
                }

            } else {
                $this->errors = $errors;
            }
        }

        parent::renderTemplate('login.html.twig', ['errors' => $this->errors]);

    }

    /**
     * logout method logs out the user when called
     *
     * @return void
     */
    public function logout() {
        $this->session->delete();
        Url::redirect("/article/index");
    }

    /**
     * requireLogin checks when whether the user is logged in or not to display a specific page
     *
     * @return void
     */
    public static function requireLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['id'])) {
            // redirect to login page if user is not logged in
            Url::redirect("/login/signin");
        }
    }

    /**
     * Checks whether the logged-in user is the author of a given article,
     *  and redirects to the article index page if not.
     *
     * @param object data
     * @return void
     */
    public static function auth($data) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['id']) || $_SESSION['id'] != $data->user_id) {
            Url::redirect("/article/index");
        }
    }

    /**
     * isAdmin checks whether the user is an admin
     *
     * @return void
     */
    public static function isAdmin() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SESSION['role'] != 'admin') {
            Url::redirect("/article/index");
        }
    }
}