<?php

namespace App\Domain\Delivery\Api\Interfaces;

use App\Domain\Delivery\Interfaces\DeliveryStatus;
use phpDocumentor\Reflection\Types\Self_;

interface DpdExceptionInterface extends DeliveryStatus
{
    /**
     * write all possible error message code that could be given
     */


    const OK = "OK";
    const ORDER_PENDING = "OrderPending";
    const ORDER_DUPLICATE = "OrderDuplicate";
    const ORDER_ERROR = "OrderError";
    const ORDER_CANCELED = "OrderCancelled";

    const CANCELED = "Canceled";

    const CANCELED_PREVIOUSLY = "CanceledPreviously";
    const CALL_DPD = "CallDPD";
    const NOT_FOUND = "NotFound";
    const EXCEPTION = [
        self::CANCELED_PREVIOUSLY => "Отменено ранее",
        self::CALL_DPD => "Состояние заказа не позволяет отменить заказ самостоятельно, для отмены заказа необходим звонок в Конткат-Центр.",
        self::NOT_FOUND => "Данные не найдены"
    ];

    const STATUS_TO_DB = [
        self::OK => self::CREATED,
        self::ORDER_PENDING => self::DELIVERY_PENDED
    ];
}
