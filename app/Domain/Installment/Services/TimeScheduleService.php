<?php

namespace App\Domain\Installment\Services;

use App\Domain\Installment\Entities\TimeScheduleTransactions;

class TimeScheduleService
{
    const FAILED_ALL = "Снятие денег со всех возможных карточек не удалась";
    const FAILED_ONE = "Cнятие денег с карточки номера %s не удалась. По причине %s";
    const FAILED_LOOP = self::FAILED_ONE . " " . "Повторная попытка будет через 2 часа";
    const SUCCESS = "Успешно снял деньги с карточки %s";

    static private function create($numberCard, $reason, $template, $taken_id)
    {
        TimeScheduleTransactions::create([
            'details' => sprintf($template, $numberCard, $reason),
            'take_credit_id' => $taken_id
        ]);
    }

    static public function failed($numberCard, $reason, $taken_id)
    {
        self::create($numberCard, $reason, self::FAILED_ONE, $taken_id);
    }

    static public function failedAll($taken_id)
    {
        self::create("", "", self::FAILED_ALL, $taken_id);
    }

    static public function failedLoop($numberCard, $reason, $taken_id)
    {
        self::create($numberCard, $reason, self::FAILED_LOOP, $taken_id);
    }

    static public function success($numberCard, $taken_id)
    {
        self::create($numberCard, "", self::SUCCESS, $taken_id);
    }
}
