<?php

namespace App\Domain\Delivery\Api\Models;


use App\Domain\Delivery\Api\Base\DpdClient;

class DpdGeography extends DpdClient
{
    const GEOGRAPHY = "geography2?wsdl";

    /**
     * @params string $countryCode
     * @return array for creation AvailableCities
     *
     * Параметр    Описание    Тип    Пример
     * city        Массив городов с поддержкой доставки с наложенным платежом
     * cityId    Идентификатор города    Число    195644235
     * countryCode    Код страны    Строка    RU
     * countryName    Страна    Строка    Россия
     * regionCode    Код региона    Число    50
     * regionName    Регион    Строка    Московская
     * cityCode    Код населенного пункта    Строка    50017001000
     * cityName    Населенный пункт    Строка    Люберцы (буквенные обозначения аббревиатур и других знаков)
     * abbreviation    Аббревиатура    Строка    г
     * indexMin    Минимальный индекс    Строка    140000
     * indexMax    Максимальный индекс    Строка    143818
     */
    public function __construct()
    {
        parent::__construct(self::GEOGRAPHY);
    }

    private function stdToArray($obj)
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

    /**
     * с наложеннным платежём
     */
    protected function getCities(string $countryCode): array
    {
        $request = [
            'countryCode' => $countryCode
        ];
        $merged = array_merge($request, $this->auth);
        $request = [
            'request' => $merged
        ];
        echo collect($request);
        $response = $this->client->getCitiesCashPay($request);
        $response = $this->stdToArray($response);
        /**
         * check the status of the response raise the error if the error occured
         */
        return $response['return'];
    }

    /**
     * @return  array of serialized data for inseration to AvailableCities
     * */
    public function getSerializedCities(string $countryCode)
    {
        $response = $this->getCities($countryCode);
        return $response;
        //**
        // seriealize the data
        //*/
    }
}
