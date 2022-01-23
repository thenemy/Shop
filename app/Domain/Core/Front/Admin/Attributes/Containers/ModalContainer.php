<?php

namespace App\Domain\Core\Front\Admin\Attributes\Containers;

class ModalContainer extends Container
{
    public function generateHtml(): string
    {
        $this->attributes['x-show'] = "show";
        return sprintf("<div x-cloak %s><x-helper.modal.modal_base>%s</x-helper.modal.modal_base></div>",
            $this->generateAttributes(),
            $this->generateItems());
    }
}
