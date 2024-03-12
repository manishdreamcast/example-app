<?php
namespace App\Libraries;

class StatusCode
{
    public const HTTP_OK = 200;
    public const HTTP_CREATED = 201;
    public const HTTP_BAD_REQUEST = 400;
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_FORBIDDEN = 403;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_METHOD_NOT_ALLOWED = 405;
    public const HTTP_INTERNAL_SERVER_ERROR = 500;

    public static function getMessage($statusCode)
    {
        switch ($statusCode) {
            case self::HTTP_OK:
                return 'OK';
            case self::HTTP_CREATED:
                return 'Created';
            case self::HTTP_BAD_REQUEST:
                return 'Bad Request';
            case self::HTTP_UNAUTHORIZED:
                return 'Unauthorized';
            case self::HTTP_FORBIDDEN:
                return 'Forbidden';
            case self::HTTP_NOT_FOUND:
                return 'Not Found';
            case self::HTTP_METHOD_NOT_ALLOWED:
                return 'Method Not Allowed';
            case self::HTTP_INTERNAL_SERVER_ERROR:
                return 'Internal Server Error';
            default:
                return 'Unknown Status Code';
        }
    }
}
