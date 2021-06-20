<?php
define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);

require_once ROOT_DIR . '/vendor/autoload.php';

use Nap\Configuration\Configuration;
use Nap\Response;
use Helpers\FileLogger;
use Nap\Request;

// Initialization
iniConfig();
iniLogging();
setErrorHandlers();

$response = getResponse();

Response::process($response);

// Sub procedures
function iniConfig()
{
    $jsonfile = ROOT_DIR . '/config/config.json';
    $hasErrors = [];

    if (file_exists($jsonfile)) {
        $hasErrors = Configuration::initByJson($jsonfile);
    } else {
        $hasErrors = Configuration::initByIni(ROOT_DIR . '/config/config.ini');
    }

    if ($hasErrors) {
        Response::warning($hasErrors[0], $hasErrors[1]);
    }
}

function iniLogging()
{
    $system = Configuration::getData('system');

    FileLogger::setConfig(Configuration::getData('logger'));

    FileLogger::init($system['debug']);
}

function setErrorHandlers()
{
    set_error_handler('Helpers\ErrorHandler::errorHandler');

    set_exception_handler('Helpers\ErrorHandler::exceptionHandler');

    register_shutdown_function('Helpers\ErrorHandler::shutdown');
}

function getRequestMethod(): string
{
    $method = strtoupper($_SERVER['REQUEST_METHOD']);

    if ($method === 'OPTIONS') {
        $cors = Configuration::getData('cors');

        header("Access-Control-Allow-Origin: {$cors['allowed-origins']}");
        header("Access-Control-Allow-Headers: {$cors['allowed-headers']}");
        header("Access-Control-Allow-Methods: {$cors['allowed-methods']} OPTIONS");

        Response::okEmpty(Response::OK_NO_CONTENT);
    }

    return $method;
}

function getResponse(): array
{
    $hasErrors = [];
    $method = getRequestMethod();

    $hasErrors = Request::setRequest($method);

    if ($hasErrors) {
        Response::warning($hasErrors[0], $hasErrors[1]);
    }

    return Request::getResponse();
}