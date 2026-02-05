<?php

declare(strict_types=1);

// Set start-time for debugging purposes
define('SIMPLESAMLPHP_START', hrtime(true));

// Bootstrap the application
require_once __DIR__ . '/_bootstrap.php';

// initialize the autoloader
require_once SIMPLESAMLPHP_UPSTREAM . '/src/_autoload.php';

use SAML2\Compat\ContainerSingleton;
use SimpleSAML\Compat\SspContainer;
use SimpleSAML\Configuration;
use SimpleSAML\Error;
use SimpleSAML\Utils;

$exceptionHandler = new Error\ExceptionHandler();
set_exception_handler([$exceptionHandler, 'customExceptionHandler']);

$errorHandler = new Error\ErrorHandler();
set_error_handler([$errorHandler, 'customErrorHandler']);

try {
    Configuration::getInstance();
} catch (Exception $e) {
    throw new Error\CriticalConfigurationError(
        $e->getMessage(),
    );
}

// set the timezone
$timeUtils = new Utils\Time();
$timeUtils->initTimezone();

// set the SAML2 container
$container = new SspContainer();
ContainerSingleton::setContainer($container);
