<?php

require dirname(__DIR__) . "/vendor/autoload.php";

/**
 * Error and Exception handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

Core\Router::run();
