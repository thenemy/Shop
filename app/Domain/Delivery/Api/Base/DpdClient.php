<?php

namespace App\Domain\Delivery\Api\Base;

use App\Domain\Delivery\Api\Interfaces\DpdInterface;
use SoapClient;

class DpdClient implements DpdInterface
{
    public SoapClient $client;
    public array $auth = [];

    /**
     * @throws \SoapFault
     */
    public function __construct($method)
    {
        $this->client = new SoapClient(self::CONNECT_TEST . $method);
        $this->auth['auth'] = [
            'clientNumber' => self::CLIENT_NUMBER,
            'clientKey' => self::CLIENT_KEY
        ];
    }
}