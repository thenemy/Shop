<?php

namespace App\Domain\Delivery\Api\Interfaces;

interface DpdInterface
{
    const CONNECT_TEST = "http://wstest.dpd.ru/services/";
    const CONNECT_PRODUCTION = "http://ws.dpd.ru/services/";
    const GEOGRAPHY = "geography2?wsdl";
    const CALCULATOR = "calculator2?wsdl";

    const CLIENT_NUMBER = '';
    const CLIENT_KEY = "";
}
