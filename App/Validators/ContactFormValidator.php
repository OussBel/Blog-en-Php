<?php

namespace App\Validators;

class ContactFormValidator
{

    public static function validateContactForm(string $name, string $subject, string $email, string $content): array
    {

        $errors = [];

        if (empty(trim($name))) {
            $errors['name'] = "Veuillez ajouter votre nom";
        }

        if (empty(trim($subject))) {
            $errors['subject'] = "Veuillez ajouter le sujet";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Entrez une adresse émail valide';
        }

        if (empty(trim($content))) {
            $errors['content'] = "Veuillez ajouter votre message";
        }

        return $errors;

    }
}