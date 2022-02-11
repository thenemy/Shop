@extends("admin.open_layout.edit")
@section("action")
    

<x-helper.input.input name='phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("phone") ?? $entity->phone ?? " "}}' id='phone'  onkeyup="" />
<x-helper.input.input name='additional_phone' type='text'
            label='{{__("Дополнительный телефон")}}' value='{{old("additional_phone") ?? $entity->additional_phone ?? " "}}' id='additional_phone'  onkeyup="" />
<x-helper.input.input name='crucialData->firstname' type='text'
            label='{{__("Имя пользователя")}}' value='{{old("crucialData->firstname") ?? $entity->crucialData->firstname ?? " "}}' id='crucialData->firstname'  onkeyup="" />
<x-helper.input.input name='crucialData->lastname' type='text'
            label='{{__("Фамилия пользователя")}}' value='{{old("crucialData->lastname") ?? $entity->crucialData->lastname ?? " "}}' id='crucialData->lastname'  onkeyup="" />
<x-helper.input.input name='crucialData->father_name' type='text'
            label='{{__("Отчество пользователя")}}' value='{{old("crucialData->father_name") ?? $entity->crucialData->father_name ?? " "}}' id='crucialData->father_name'  onkeyup="" />
<x-helper.input.input name='crucialData->series' type='text'
            label='{{__("Паспорт серия")}}' value='{{old("crucialData->series") ?? $entity->crucialData->series ?? " "}}' id='crucialData->series'  onkeyup="" />
<x-helper.input.input name='crucialData->pnfl' type='text'
            label='{{__("ПНФЛ")}}' value='{{old("crucialData->pnfl") ?? $entity->crucialData->pnfl ?? " "}}' id='crucialData->pnfl'  onkeyup="" />
<x-helper.input.input name='crucialData->date_of_birth' type='date'
            label='{{__("Дата рождения")}}' value='{{old("crucialData->date_of_birth") ?? $entity->crucialData->date_of_birth ?? " "}}' id='crucialData->date_of_birth'  onkeyup="" />
@if($entity)  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_reverse_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Прописка'])->html();
} elseif ($_instance->childHasBeenRendered('4jDnomJ')) {
    $componentId = $_instance->getRenderedChildComponentId('4jDnomJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('4jDnomJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4jDnomJ');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_reverse_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Прописка']);
    $html = $response->html();
    $_instance->logRenderedChild('4jDnomJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_user_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт c пользователем'])->html();
} elseif ($_instance->childHasBeenRendered('QwtwoTr')) {
    $componentId = $_instance->getRenderedChildComponentId('QwtwoTr');
    $componentTag = $_instance->getRenderedChildComponentTagName('QwtwoTr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QwtwoTr');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_user_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт c пользователем']);
    $html = $response->html();
    $_instance->logRenderedChild('QwtwoTr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт пользователя'])->html();
} elseif ($_instance->childHasBeenRendered('ow3Ndqs')) {
    $componentId = $_instance->getRenderedChildComponentId('ow3Ndqs');
    $componentTag = $_instance->getRenderedChildComponentTagName('ow3Ndqs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ow3Ndqs');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт пользователя']);
    $html = $response->html();
    $_instance->logRenderedChild('ow3Ndqs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.pages.surety-open-edit.surety-plastic-card-dynamic', ['parentKey' => 'user_id','parentId' => $entity->id])->html();
} elseif ($_instance->childHasBeenRendered('1KfENaJ')) {
    $componentId = $_instance->getRenderedChildComponentId('1KfENaJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('1KfENaJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1KfENaJ');
} else {
    $response = \Livewire\Livewire::mount('admin.pages.surety-open-edit.surety-plastic-card-dynamic', ['parentKey' => 'user_id','parentId' => $entity->id]);
    $html = $response->html();
    $_instance->logRenderedChild('1KfENaJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
@else 
 @endif
@endsection
