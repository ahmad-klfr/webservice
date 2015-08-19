<?php

namespace OpiloClient\Response;

use Exception;

class CommunicationException extends Exception
{
    const GENERAL_HTTP_ERROR = 1;
    const AUTH_ERROR = 2;
    const UNPROCESSABLE_RESPONSE = 10;
    const UNPROCESSABLE_RESPONSE_ITEM = 11;

    public static function createFromHTTPResponse($statusCode, $bodyContents)
    {
        switch ($statusCode) {
            case '401':
                return new static('Authentication Failed', static::AUTH_ERROR);
            default:
                return new static("StatusCode: $statusCode, Contents: $bodyContents", static::GENERAL_HTTP_ERROR);
        }
    }
}