<?php

namespace App\Domain\Product\Product\Front\ComplexFactoring;

use App\Domain\Common\Colors\Front\Admin\DropDown\ColorDropDownSearch;
use App\Domain\Core\File\Models\Livewire\FileLivewireFactoring;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempManyAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\ComplexFactoring;
use App\Domain\Product\Product\Interfaces\ProductInterface;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireFactoring;

class ColorComplexFactoring implements ComplexFactoring, ProductInterface
{

    static public function initialize(BaseLivewireFactoring $factoring)
    {
        foreach ($factoring->entity->colors as $color) {
            $factoring->counter++;
            $factoring->entities[$factoring->counter] = $color;
        }
    }

    static public function delete(BaseLivewireFactoring $factoring, $id)
    {

    }

    static public function create()
    {
        return [
            ColorDropDownSearch::newColor(true, [], [
                'wire:key' => 'drop_objects.{{$index}}.color_id',
                'prefix' => sprintf('%s{{$index}}%s', ProductInterface::COLORS_TO, \CR::CR),
            ]),
            InputFileTempAttribute::create(self::COLORS_TO .
                sprintf('%%s%simage', \CR::CR),
                "Главный цвет",
                'product_file_objects.{{$index}}.file_one',
                self::INDEX
            ),
            InputFileTempManyAttribute::create(self::COLORS_TO .
                sprintf('%%s%simages', \CR::CR),
                "Под цвета",
                'product_file_objects.{{$index}}.file_two',
                self::INDEX),
        ];
    }

    static public function edit()
    {
        return [
            ColorDropDownSearch::newColor(true, [], [
                'wire:key' => 'drop_objects.{{$index}}.color_id',
                'prefix' => sprintf('%s{{$index}}%s', ProductInterface::COLORS_TO, \CR::CR),
            ]),
            InputFileTempAttribute::edit(self::COLORS_TO .
                sprintf('%%s%simage', \CR::CR),
                "Главный цвет",
                '$entity->image',
                'product_file_objects.{{$index}}.file_one',
                self::INDEX,
                ""
            ),
            InputFileTempManyAttribute::edit(self::COLORS_TO .
                sprintf('%%s%simages', \CR::CR),
                "Под цвета",
                '$entity->images',
                'product_file_objects.{{$index}}.file_two',
                self::INDEX),
        ];
    }
}
