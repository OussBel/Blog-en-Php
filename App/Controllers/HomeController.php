<?php

namespace App\Controllers;

use App\Helpers\Mail;
use App\Helpers\Session;
use App\Validators\ContactFormValidator;

/**
 * Class HomeController handles the contact form inputs
 * to send them to the user with mailjet
 */
class HomeController extends \Core\View
{

    private array $errors = [];
    private Session $session;

    /**
     * Contructor that gets the instance of the session
     */
    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * index method handles the inputs of the contact form
     *
     * @return void
     */
    public function index(): void
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
            $this->session->csrfToken === $_POST['csrfToken']) {
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $content = $_POST['content'];

            $errors = ContactFormValidator::validateContactForm($name,
                $subject, $email, $content);

            $invalid = implode($errors);

            if (!empty($invalid)) {
                $this->errors = $errors;
            } else {
                $mail = new Mail();
                $mail->send($name, $subject, $email, $content);
            }
        }
        parent::renderTemplate('home.html.twig', ['errors' => $this->errors]);
    }
}