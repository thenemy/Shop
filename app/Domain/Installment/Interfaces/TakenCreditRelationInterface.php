<?php

namespace App\Domain\Installment\Interfaces;

use App\Domain\User\Interfaces\UserRelationInterface;

interface TakenCreditRelationInterface
{
    const SURETY_SERVICE = "surety";
    const USER_SERVICE = "user";
    const USER_DATA_SERVICE = "userData";
    const PURCHASE_SERVICE = "purchase";
    const PLASTIC_CARD_SERVICE = "plastic";
    const PLASTIC_CARD_TO = self::PLASTIC_CARD_SERVICE . \CR::CR;
    const USER_DATA_TO = self::USER_DATA_SERVICE . \CR::CR;
    const CRUCIAL_DATA_TO = self::USER_DATA_TO . UserRelationInterface::CRUCIAL_DATA_SERVICE . \CR::CR;
    const USER_TO = self::USER_SERVICE . \CR::CR;
    const SURETY_TO = self::SURETY_SERVICE . \CR::CR;
    const PURCHASE_TO = self::PURCHASE_SERVICE . \CR::CR;
}