<?php

namespace App\Domain\Delivery\Api\Models;


use App\Domain\Delivery\Api\Base\DpdClient;

class DpdGeography extends DpdClient
{
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
    protected function getCities(string $countryCode): array
    {
        $request = [
            'countryCode' => $countryCode
        ];
        array_push($request, $this->auth);
        $response = $this->client->getCitiesCashPay($request);
        /**
         * check the status of the response raise the error if the error occured
         */
        return $response;
    }

    /**
     * @return  array of serialized data for inseration to AvailableCities
     * */
    public function getSerializedCities(string $countryCode)
    {
        $response = $this->getCities($countryCode);
        //**
        // seriealize the data
        //*/
    }
}
