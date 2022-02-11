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
} elseif ($_instance->childHasBeenRendered('IUk0wn6')) {
    $componentId = $_instance->getRenderedChildComponentId('IUk0wn6');
    $componentTag = $_instance->getRenderedChildComponentTagName('IUk0wn6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('IUk0wn6');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_reverse_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Прописка']);
    $html = $response->html();
    $_instance->logRenderedChild('IUk0wn6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_user_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт c пользователем'])->html();
} elseif ($_instance->childHasBeenRendered('uaZemYK')) {
    $componentId = $_instance->getRenderedChildComponentId('uaZemYK');
    $componentTag = $_instance->getRenderedChildComponentTagName('uaZemYK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uaZemYK');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_user_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт c пользователем']);
    $html = $response->html();
    $_instance->logRenderedChild('uaZemYK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт пользователя'])->html();
} elseif ($_instance->childHasBeenRendered('I1NWpH8')) {
    $componentId = $_instance->getRenderedChildComponentId('I1NWpH8');
    $componentTag = $_instance->getRenderedChildComponentTagName('I1NWpH8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('I1NWpH8');
} else {
    $response = \Livewire\Livewire::mount('components.file.file-uploading', ['entityId' => $entity->id,'mediaKey' => 'passport_edit','entityClass' => 'App\Domain\User\Front\Open\SuretyOpenEdit','multiple' => false,'label' => 'Паспорт пользователя']);
    $html = $response->html();
    $_instance->logRenderedChild('I1NWpH8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.pages.surety-open-edit.surety-plastic-card-dynamic', ['parentKey' => 'user_id','parentId' => $entity->id])->html();
} elseif ($_instance->childHasBeenRendered('TaGt7kk')) {
    $componentId = $_instance->getRenderedChildComponentId('TaGt7kk');
    $componentTag = $_instance->getRenderedChildComponentTagName('TaGt7kk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TaGt7kk');
} else {
    $response = \Livewire\Livewire::mount('admin.pages.surety-open-edit.surety-plastic-card-dynamic', ['parentKey' => 'user_id','parentId' => $entity->id]);
    $html = $response->html();
    $_instance->logRenderedChild('TaGt7kk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
@else 
 @endif
@endsection
