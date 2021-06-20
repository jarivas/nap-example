<?php


namespace Helpers;

use Nap\Response;
use Nap\Configuration\Configuration;

class ErrorHandler
{
    public static function errorHandler($errno, $errstr, $errfile, $errline): bool
    {
        $system = Configuration::getData('system');

        $message = ($system['debug']) ? sprintf('%s %s:%s', $errstr, $errfile, $errline) : $errstr;

        switch ($errno) {
            case E_WARNING:
                FileLogger::warning($message);
                break;
            case E_NOTICE:
                FileLogger::notice($message);
                break;
            default:
                FileLogger::critical($message);
                break;
        }

        Response::warning($message, Response::FATAL_INTERNAL_ERROR);

        /* Don't execute PHP internal error handler */
        return true;
    }

    public static function exceptionHandler($exception)
    {
        $system = Configuration::getData('system');

        $code = $exception->getCode();
        $message = $exception->getMessage();
        $file = $exception->getFile();
        $line = $exception->getLine();

        if ($code) {
            if ($system['debug']) {
                $message = sprintf('%s %s:%s', $message, $file, $line);
            }

            FileLogger::alert($message);
            Response::warning($message, Response::FATAL_INTERNAL_ERROR);
        } else {
            self::errorHandler(null, $message, $file, $line);
        }
    }

    public static function shutdown()
    {
        $error = error_get_last();

        if ($error && ($error['type'] == E_ERROR)) {
            self::errorHandler($error['type'], $error['message'], $error['file'], $error['line']);
        }
    }
}