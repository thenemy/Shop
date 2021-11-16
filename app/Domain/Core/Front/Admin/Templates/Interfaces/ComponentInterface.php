<?php

namespace App\Domain\Core\Front\Admin\Templates\Interfaces;
// add label
interface ComponentInterface
{
    //first all inputs
    //language input make a little a bit different
    const INPUT = "<x-helper.input.input :type='%s' name='%s' value='%s'/>";
    // text area component
    const TEXT_AREA = "<x-helper.text_area.text_area type='%s' name='%s'>%s</x-helper.text_area.text_area>";
    //image component
    const IMAGE = "<x-helper.input.input_file_drag_drop :file='%s'></x-helper.input.input_file_drag_drop>";
    //OPEN_BUTTON component has to be made
    const OPEN_BUTTON = "<x-helper.open_button.open_button color='%s' :button='%s'/>";

    const DROP_DOWN = "<x-helper.drop_down.base_drop_down :drop='%s' />";

    const INPUT_FORM = 0;
    const TEXT_AREA_FORM = 1;
    const IMAGE_FORM = 2;
    const OPEN_BUTTON_FORM = 3;
    const DROP_DOWN_FORM = 4;

    const MAP = [
        self::INPUT_FORM => self::INPUT,
        self::TEXT_AREA_FORM => self::TEXT_AREA,
        self::IMAGE_FORM => self::IMAGE,
        self::OPEN_BUTTON_FORM => self::OPEN_BUTTON,
        self::DROP_DOWN_FORM => self::DROP_DOWN
    ];
}
