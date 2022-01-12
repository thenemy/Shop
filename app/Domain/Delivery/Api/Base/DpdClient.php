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
            'clientNumber' => env("DPD_CLIENT_NUMBER"),
            'clientKey' => env("DPD_CLIENT_KEY")
        ];
    }
    protected function stdToArray($obj)
    {
        $rc = (array)$obj;
        foreach ($rc as $key => $item) {
            $rc[$key] = (array)$item;
            foreach ($rc[$key] as $keys => $items) {
                $rc[$key][$keys] = (array)$items;
            }
        }
        return $rc;
    }
}
