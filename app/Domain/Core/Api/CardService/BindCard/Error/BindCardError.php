<?php

namespace App\Domain\Core\Api\CardService\BindCard\Error;

class BindCardError extends \Exception
{
    const ALREADY_EXISTS = 111111111; // the message will contain string json of the response so data could be extracted
    const ERROR_OCCURED = 99999999; // throw description string of error message
}
