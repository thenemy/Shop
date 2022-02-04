<?php

namespace App\Domain\Installment\Front\Admin\Attributes;

use App\Domain\Core\File\Interfaces\CreatorInterface;
use App\Domain\Core\File\Interfaces\FactoryFileInterface;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreatorFullyEmpty;
use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\File\Models\Livewire\LivewireDynamic;
use App\Domain\Core\Front\Admin\Attributes\Containers\BoxTitleContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\ConcatenateHtml;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Attributes\Containers\ModalContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\ModalCreator;
use App\Domain\Core\Front\Admin\Attributes\Text\Text;
use App\Domain\Core\Front\Admin\Button\ModelInCompelationTime\ButtonDaisy;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\Button;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonBlueLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGrayLivewire;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\Domain\Installment\Front\Nested\TransactionIndex;

class DescriptionAboutTransaction implements HtmlInterface, FactoryFileInterface
{

    public function generateHtml(): string
    {
        return ConcatenateHtml::new([
            ModalCreator::new(new ButtonShow(),
                ModalContainer::new([], [
                    ContainerColumn::new([
                        'class' => "bg-white p-10 rounded",
                        "@click.away" => "show = false"
                    ],
                        [
                            Text::new(__("История платежей"), [
                                'class' => 'text-center  text-black_custom text-2xl font-bold'
                            ]),
                            new LivewireDynamic(
                                new FileLivewireWithoutActionFilterBy(
                                    "TakenCreditShow",
                                    TransactionIndex::new(),
                                    false)
                            ),
                            Container::new([
                                'class' => "self-end"
                            ], [
                                Button::new("Назад", [
                                    'class' => "btn btn-xs",
                                    "@click" => 'show = false'
                                ]),
                            ]),
                        ]
                    )
                ])),
        ])->generateHtml();
    }


   static public function createFiles()
    {
        new FileLivewireCreatorFullyEmpty(
            "TakenCreditShow",
            TransactionIndex::new());
    }
}
