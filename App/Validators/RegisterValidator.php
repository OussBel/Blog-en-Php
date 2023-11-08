<?php
declare (strict_types=1);

namespace App\Validators;

class RegisterValidator
{

    public static function validateForm(string $name, string $email, string $password, string $confirmPassword): array
    {
        $errors = [];

        if (empty(trim($name))) {
            $errors['name'] = 'Entrez votre nom';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Entrez une adresse émail valide';
        }

        if (strlen($password) < 6) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 6 lettres';
        }

        if ($password != $confirmPassword) {
            $errors['confirmPassword'] = 'Le mot de passe ne correspond pas';
        }

        return $errors;
    }
}