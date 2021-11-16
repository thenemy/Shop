<?php

namespace App\Domain\Core\Front\Admin\Templates\Interfaces;

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
    const OPEN_BUTTON = "<x-helper.button.open_button color='%s' :button='%s'/>";
}
