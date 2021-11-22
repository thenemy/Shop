<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseAttributeForm;
// make livewire
// make one more button to add and continue
// make search and dropdown | search will appear if the some icon was pressed
// input label must do
class InputFileAttribute extends BaseAttributeForm
{

    public function generateHtml():string
    {
        return "<x-helper.input.input_file/>";
    }
}
