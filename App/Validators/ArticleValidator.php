<?php
declare (strict_types=1);

namespace App\Validators;

class ArticleValidator
{

    public static function validateForm(object $article, array $errors): array
    {

        if (empty(trim($article->title))) {
            $errors['title'] = 'Le titre est requis';
        }

        if (empty(trim($article->subtitle))) {
            $errors['subtitle'] = 'Le chapo est requis';
        }

        if (empty(trim($article->content))) {
            $errors['content'] = 'Le contenu est requis';
        }

        if (empty(trim($article->category_id))) {
            $errors['category_id'] = 'La catégorie est requise';
        }

        $errors['size'] = $_FILES['image']['error'] == 1 ?
            'Fichier trop grande' : '';

        if ($_FILES['image']['error'] == 0) {
            $allowed_types = ['image/jpeg', 'image/gif', 'image/png'];
            $type = mime_content_type($_FILES['image']['tmp_name']);

            $errors['size'] = $_FILES['image']['size'] < 52142880 ? '' :
                'Fichier trop grand';
            $errors['file_type'] = in_array($type, $allowed_types) ? '' :
                'Type de fichier non autorisé';
            $allowed_exts = ['jpeg', 'jpg', 'png', 'gif'];
            $filename = strtolower($_FILES['image']['name']);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $errors['extension'] = in_array($ext, $allowed_exts) ? '' :
                'Type d\'extension non autorisé';
        }

        return $errors;
    }

}