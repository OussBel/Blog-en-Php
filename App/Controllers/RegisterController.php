<?php

declare (strict_types=1);

namespace App\Controllers;

use App\Helpers\Session;
use App\Helpers\Url;
use App\Models\UserManager as User;
use App\Validators\RegisterValidator;

/**
 * Class RegisterController handles registration process
 */
class RegisterController extends \Core\View
{

    private array $errors = [];
    private User $user;
    private Session $session;

    /**
     * Constructor initializes the user and the session
     */
    public function __construct()
    {
        $this->user = new User();
        $this->session = Session::getInstance();
    }

    /**
     * addMember handles the inputs of the regitration form
     *
     * @return void
     */
    public function addMember(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'
            && $this->session->csrfToken === $_POST['csrfToken']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            $errors = RegisterValidator::validateForm($name, $email, $password,
                $confirmPassword);

            $invalid = implode($errors);

            if (empty($invalid)) {
                try {
                    if ($this->user->addMember($name, $email, $password)) {
                        Url::redirect("/login/signin");
                    }
                } catch (\PDOException $e) {
                    if ($e->errorInfo[1] === 1062) {
                        $this->errors['email'] = 'Email déjà utilisé, veuillez le modifier';
                    } else {
                        throw $e;
                    }
                }
            } else {
                $this->errors = $errors;
            }
        }

        parent::renderTemplate('register.html.twig',
            [
                'name' => $name ?? '',
                'email' => $email ?? '',
                'errors' => $this->errors,
            ]);
    }
}