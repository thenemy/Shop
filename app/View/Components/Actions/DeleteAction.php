<?php


namespace App\View\Components\Actions;


use App\View\Components\Base\BaseComponent;

class DeleteAction extends BaseComponent

{


    protected function getPathToComponent(): string
    {
        return "components.helper.icon_button.delete_icon";
    }
}
