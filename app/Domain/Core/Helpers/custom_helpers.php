<?php

if (!function_exists('put_env')) {
    function put_env(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
}
if (!function_exists('get_cities')) {
    function get_cities(array $values = [])
    {
        $s = new \App\Domain\Delivery\Api\Models\DpdGeography();
        $result = $s->getSerializedCities("UZ");
        $service = new \App\Domain\Delivery\Services\AvailableCitiesService();
        $service->bulkInsertion($result);
    }
}
if (!function_exists('test')) {
    function test(array $values = [])
    {
        \App\Domain\Telegrams\Job\TelegramJob::dispatchSync(\App\Domain\Installment\Entities\TakenCredit::first()->purchase);
    }
}
if (!function_exists('check_auto')) {
    function check_auto(array $values = [])
    {
        $auth = new \App\Domain\Core\Api\CardService\Model\AuthPaymoService();
        $auth->getToken();
    }
}


if (!function_exists('send_code')) {
    function send_code(array $values = [])
    {
        $auth = new \App\Domain\Core\Api\CardService\BindCard\Model\BindCardService();
        $transaction_id = $auth->create("8600312990314318", "08/23");
        $auth->apply($transaction_id, "111111");
    }
}

if (!function_exists('merchant')) {
    function merchant(array $values = [])
    {
        $merchant = new \App\Domain\Core\Api\CardService\Merchant\Model\Merchant();
        $create = $merchant->create("100000", "0000000");
        $merchant->pre_confirm("937675F10965005AE053C0A865A6689Bx", $create);
        $s = $merchant->confirm($create);
        dd($s);
    }
}
if (!function_exists('str_day_of_week')) {
    function str_day_of_week(int $day): string
    {
        return \App\Domain\Shop\Interfaces\DayInterface::DB_TO_FRONT[__($day)];
    }
}
if (!function_exists('month_num')) {
    function month_num(): int
    {
        return intval(date('m'));
    }
}
if (!function_exists('today_num')) {
    function today_num(): int
    {
        return intval(date('d'));
    }
}

if (!function_exists('weekday_num')) {
    function weekday_num(): int
    {
        return intval(date('w'));
    }
}


if (!function_exists('cities')) {
    function cities()
    {
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Domain\Delivery\Excell\Imports\AvailableCityImport(),
            public_path("cities.xls"));
    }
}
if (!function_exists('telegram')) {
    function telegram()
    {
        $telegram = new \App\Domain\Telegrams\Schedule\TelegramSchedule(new \Illuminate\Console\Scheduling\Schedule());
        $telegram->run();
    }
}
