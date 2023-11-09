<?php

declare (strict_types=1);

namespace Core;

/**
 * Router class responsible for parsing the URL, determining the route,
 * and dispatching the request to the corresponding controller action.
 */
class Router
{

    /**
     * Namespace for admin controllers.
     *
     * @var string
     */
    private static string $adminNamespace = '';

    /**
     * Parses the current URL and initiates the dispatch process.
     */
    public static function run(): void
    {
        list($controllerName, $action, $params) = self::parseUrl();

        $controllerClass = self::getControllerClass($controllerName);

        if (!self::isValidRoute($controllerClass, $action, $params)) {
            View::renderTemplate('404.html.twig');
            return;
        }

        self::executeControllerAction($controllerClass, $action, $params);
    }

    /**
     * Extracts the controller name, action, and parameters from the URL.
     *
     * @return array An array consisting of the controller name, action, and parameters.
     */
    private static function parseUrl(): array
    {
        $url = $_SERVER['QUERY_STRING'] ?: 'home/index';
        $params = explode('/', $url);

        self::setAdminNamespace($params);

        $controllerName = ucfirst(array_shift($params) ?: 'home');
        $action = str_replace('-', '', ucwords(array_shift($params) ?: 'index', '-'));

        return [$controllerName, $action, $params];
    }

    /**
     * Sets the namespace for the admin controller if the URL indicates an admin route.
     *
     * @param array $params URL segments that may contain the admin namespace.
     */
    private static function setAdminNamespace(array &$params): void
    {
        if ($params[0] === 'admin') {
            self::$adminNamespace = array_shift($params);
        }
    }

    /**
     * Constructs the fully qualified class name of the controller.
     *
     * @param string $controllerName The name of the controller.
     * @return string The fully qualified class name of the controller.
     */
    private static function getControllerClass(string $controllerName): string
    {
        $namespace = self::$adminNamespace ? "App\\Controllers\\Admin\\" : "App\\Controllers\\";
        return $namespace . $controllerName . 'Controller';
    }

    /**
     * Checks if the route is valid.
     *
     * @param string $controllerClass The controller class name.
     * @param string $action The controller method to be called.
     * @param array $params Parameters for the controller method.
     * @return bool True if the route is valid, false otherwise.
     */
    private static function isValidRoute(string $controllerClass, string $action, array $params): bool
    {
        return class_exists($controllerClass) && method_exists($controllerClass, $action) && self::paramsMatchRequirements($controllerClass, $action, $params);
    }

    /**
     * Determines if the provided parameters match the requirements of the controller method.
     *
     * @param string $controllerClass The controller class name.
     * @param string $action The controller method to be called.
     * @param array $params Parameters for the controller method.
     * @return bool True if the parameters match the method's requirements, false otherwise.
     */
    private static function paramsMatchRequirements(string $controllerClass, string $action, array $params): bool
    {
        $method = new \ReflectionMethod($controllerClass, $action);
        $numberOfRequiredParams = $method->getNumberOfRequiredParameters();
        return count($params) === $numberOfRequiredParams;
    }

    /**
     * Executes the controller action with the provided parameters.
     *
     * @param string $controllerClass The controller class name.
     * @param string $action The controller method to be called.
     * @param array $params Parameters for the controller method.
     */
    private static function executeControllerAction(string $controllerClass, string $action, array $params): void
    {
        $controller = new $controllerClass();
        $params = self::castParamsToMethodTypes(new \ReflectionMethod($controllerClass, $action), $params);
        $controller->$action(...$params);
    }

    /**
     * Casts URL parameters to their appropriate types based on the controller method's signature.
     *
     * @param \ReflectionMethod $method The reflection method of the controller action.
     * @param array $params Parameters to be casted.
     * @return array The casted parameters.
     */
    private static function castParamsToMethodTypes(\ReflectionMethod $method, array $params): array
    {
        foreach ($method->getParameters() as $index => $param) {
            if ($param->hasType() && isset($params[$index])) {
                $paramType = $param->getType()->getName();
                if ($paramType === 'int') {
                    $params[$index] = (int)$params[$index];
                }
            }
        }
        return $params;
    }
}
