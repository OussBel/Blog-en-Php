<?php
declare (strict_types=1);

namespace App\Validators;

class LoginValidator
{

    public static function validateEmailAndPassword(string $email, string $password): array
    {
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Entrez une adresse émail valide';
        }

        if (strlen($password) < 6) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 6 lettres';
        }

        return $errors;
    }
}