<?php

namespace App\Domain\Product\Product\Front\ComplexFactoring;

use App\Domain\Core\Front\Admin\Attributes\Conditions\ELSEstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Text\Text;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputExtendedAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangWithoutAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputPureAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\ComplexFactoring;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use App\Domain\Product\ProductKey\Entities\ProductKey;
use App\Domain\Product\ProductKey\Front\Dynamic\ProductValueDynamic;
use App\Domain\Product\ProductKey\Front\Dynamic\ProductValueDynamicWithoutEntity;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireFactoring;

class KeyWithMultipleValue implements ComplexFactoring, ProductInterface
{
    use AttributeGetVariable;

    static public function initialize(BaseLivewireFactoring $factoring)
    {
        foreach ($factoring->entity->productKey as $key) {
            $factoring->entities[$factoring->counter] = $key;
            $factoring->counter++;
        }
    }

    static public function delete(BaseLivewireFactoring $factoring, $id)
    {
        $object = $factoring->entities->pull($id);
        try {
            ProductKey::find($object['id'])->delete();
        } catch (\Exception $exception) {
            $factoring->entity->productKey()->detach($object['id']);
        }
    }

    static public function create(): array
    {
        return [
            Container::new([
                'class' => 'w-full',
                'wire:key' => 'super_key.{{$index}}.unique',
            ], [
                IFstatement::new(
                    self::VALUE . " && "
                    . sprintf(self::SET_VARIABLE_NOT_SCOPE, "id")),
                InputPureAttribute::new([
                    'class' => "hidden",
                    "name" => sprintf(self::SET_NAME, self::PRODUCT_KEY_TO, "id"),
                    "value" => sprintf(self::SET_VARIABLE, "id ?? 0"),
                ]),
                ENDIFstatement::new(),
                new InputLangWithoutAttribute(
                    sprintf(self::SET_VALUE_WIHOUT, "text"),
                    sprintf(self::SET_NAME, self::PRODUCT_KEY_TO, "text"),
                    sprintf(self::SET_NAME_WITHOUT, self::PRODUCT_KEY_TO, "text"),
                    "Название заголовка"),
                ProductValueDynamicWithoutEntity::getDynamic("KeyWithMultipleValue"),
            ]),
        ];
    }

    static public function edit(): array
    {
        return [
            Container::new([
                'class' => 'w-full',
                'wire:key' => 'super_key_edit.{{$index}}.unique',
            ], [
                new InputLangWithoutAttribute(
                    sprintf(self::SET_ENTITY_WITHOUT, "text"),
                    sprintf(self::SET_NAME, self::PRODUCT_KEY_TO, "text"),
                    sprintf(self::SET_NAME_WITHOUT, self::PRODUCT_KEY_TO, "text"),
                    "Название заголовка"),
                ProductValueDynamic::getDynamic("ProductEdit", "pivot->id")
            ]),
        ];
    }
}
