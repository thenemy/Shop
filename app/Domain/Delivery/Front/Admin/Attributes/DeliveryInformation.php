<?php

namespace App\Domain\Delivery\Front\Admin\Attributes;

use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\BoxTitleContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\ConcatenateHtml;
use App\Domain\Core\Front\Admin\Attributes\Models\EmptyAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Delivery\Interfaces\DeliveryStatus;
use App\Domain\Installment\Interfaces\PurchaseRelationInterface;
use App\Domain\Order\Interfaces\UserPurchaseStatus;

class DeliveryInformation extends EmptyAttribute implements PurchaseRelationInterface
{
    use AttributeGetVariable;
    // количество посылок
// сколько посылок доставлено
// сколько посылок в пути
// общая цена за доставку
// Город доставки
// Адрес доставки
    public function generateHtml(): string
    {
        return ConcatenateHtml::new([
            IFstatement::new(sprintf(
                '$entity->purchase->status == %s',
                UserPurchaseStatus::DELIVERY)),
            BoxTitleContainer::newTitle("Информация о доставке",
                "", [

                    KeyTextAttribute::new(__("Количество посылок"),
                        self::DELIVERY_TO . "count()"),
                    KeyTextAttribute::new(__("Количество посылок доставлено"),
                        self::DELIVERY_TO . sprintf("whereNot(\"status\", %s)->count()", DeliveryStatus::CREATED)),
//                                KeyTextAttribute::new(__("Общая цена за доставку"),
//                                    self::SURETY_TO . "phone"),
                    KeyTextAttribute::new(__("Город доставки"),
                        self::AVAILABLE_CITIES_TO . 'cityName'),
                    KeyTextValueAttribute::new(__("Адрес доставки"),
                        self::getAttributeVariable(self::DELIVERY_ADDRESS_TO . 'street')
                        . ', ' .
                        self::getAttributeVariable(self::DELIVERY_ADDRESS_TO . 'house')
                    ),
                ]),
            ENDIFstatement::new()

        ])->generateHtml();
    }
}
