<?php
declare (strict_types=1);

namespace Core;

use App\Helpers\Session;

/**
 * View
 * PHP 8.0
 *
 */
class View
{

    /**
     * Render a view template using Twig
     *
     * @param string $template The template file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     */

    public static function renderTemplate(string $template, array $args = []): void
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader (dirname(__DIR__) . '/App/Views');
            $twig = new \Twig\Environment ($loader);

            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $twig->addGlobal('baseUrl', $protocol . '://' . $_SERVER['SERVER_NAME']);

            $session = Session::getInstance();
            $twig->addGlobal('session', $session);
        }

        echo $twig->render($template, $args);
    }
}
