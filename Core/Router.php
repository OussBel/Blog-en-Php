<?php
declare (strict_types=1);

namespace Core;

/**
 * Router
 * PHP 8.0
 *
 */
class Router
{

    /**
     * admin
     *
     * @var string
     */
    private static string $admin;

    /**
     * Run the router.
     *
     * This method processes the request URL, determines the appropriate
     * controller and action to call, and calls the controller action
     * with the appropriate parameters.
     *
     * @return void
     */

    public static function run(): void
    {
        // Get the request URL and split it into an array of parameters.
        $url = $_SERVER['QUERY_STRING'] ?: 'home/index';
        $params = explode('/', $url);

        // Check if the first parameter is "admin".
        if ($params[0] == 'admin') {
            self::$admin = array_shift($params);
        }

        // Get the controller and action from the parameters.
        $controller = array_shift($params);
        $action = array_shift($params);

        // Convert the action parameter to camelCase format.
        $action = str_replace('-', '', ucwords($action, '-'));

        // Modify the namespace of controllers which display administration pages .
        if (self::$admin) {
            $controllerClass = "App\\Controllers\\Admin\\" . ucfirst($controller) . 'Controller';
        } else {
            $controllerClass = "App\\Controllers\\" . ucfirst($controller) . 'Controller';
        }

        // Check if the controller class exists and the action method is callable.
        if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
            // Use reflection to get information about the method
            //  and the number of its arguments.
            $method = new \ReflectionMethod($controllerClass, $action);

            // Determine the number of required parameters for the method.
            $numberOfRequiredParams = $method->getNumberOfRequiredParameters();

            // Determine the number of parameters received from the URL.
            $numberOfParamsReceived = count($params);

            // Check if the number of received parameters matches the number of required parameters.
            if ($numberOfParamsReceived !== $numberOfRequiredParams) {
                View::renderTemplate('404.html.twig');
            }

            // Instantiate the controller class and call the action method with the parameters.
            $controller = new $controllerClass();
            $controller->$action(...$params);
        } else {
            View::renderTemplate('404.html.twig');
        }
    }
}
