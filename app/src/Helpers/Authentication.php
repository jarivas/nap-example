<?php


namespace Helpers;


class Authentication extends \Nap\Authentication
{

    public static function isValid(array $headers): bool
    {
        if (empty($headers) || empty($headers['USER']) || empty($headers['PASSWORD'])) {
            return false;
        }

        return ($headers['USER'] === self::$config['user'] && $headers['PASSWORD'] === self::$config['password']);
    }
}