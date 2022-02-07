@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div x-data="setInitWidth()"
         @sidebar-event.window="setWidth($event)"
         class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{$form->title}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            
<livewire:admin.pages.decision-attribute-for-payment.decision-attribute   :entity='$entity'/>

            <div 	class='w-full space-x-4 flex flex-row  space-x-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о клиенте')}}</span>
                			
<x-helper.text.text_key_link key='Имя клиента' value='{{$entity->user->userCreditData->crucialData->name ?? ""}}' :link='route("admin.user.show", ["0" => $entity->user_id,])'></x-helper.text.text_key_link>			
@if($entity->purchase->status%10 == 1) 			
<x-helper.text.text_key key='Тип оплаты' value='Наличка ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>			
@else 			
<x-helper.text.text_key key='Номер карты' value='{{$entity->card->plastic->pan ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
 @endif
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о покупке')}}</span>
                			
<x-helper.text.text_key key='Номер Договора' value='{{$entity->purchase->id ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество покупок' value='{{$entity->purchase->number_purchase ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Сумма договора' value='{{$entity->price ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>
            </div>			
 <?php if($entity->purchase->status == 10): ?>  
            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'><?php echo e(__('Информация о доставке')); ?></span>
                			
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.helper.text.text_key','data' => ['key' => 'Количество посылок','value' => ''.e($entity->purchase->delivery()->count() ?? "").' ','classValue' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']]); ?>
<?php $component->withName('helper.text.text_key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => 'Количество посылок','value' => ''.e($entity->purchase->delivery()->count() ?? "").' ','class_value' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>			
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.helper.text.text_key','data' => ['key' => 'Количество посылок доставлено','value' => ''.e($entity->purchase->delivery()->whereNot("status", 0)->count() ?? "").' ','classValue' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']]); ?>
<?php $component->withName('helper.text.text_key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => 'Количество посылок доставлено','value' => ''.e($entity->purchase->delivery()->whereNot("status", 0)->count() ?? "").' ','class_value' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>			
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.helper.text.text_key','data' => ['key' => 'Город доставки','value' => ''.e($entity->purchase->delivery_address->availableCities->cityName ?? "").' ','classValue' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']]); ?>
<?php $component->withName('helper.text.text_key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => 'Город доставки','value' => ''.e($entity->purchase->delivery_address->availableCities->cityName ?? "").' ','class_value' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>			
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.helper.text.text_key','data' => ['key' => 'Адрес доставки','value' => ''.e($entity->purchase->delivery_address->street ?? "").', '.e($entity->purchase->delivery_address->house ?? "").' ','classValue' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute']]); ?>
<?php $component->withName('helper.text.text_key'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['key' => 'Адрес доставки','value' => ''.e($entity->purchase->delivery_address->street ?? "").', '.e($entity->purchase->delivery_address->house ?? "").' ','class_value' => 'App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>  <?php endif; ?>
            </div>
<x-helper.container.container :title='__("Товары")' 	class='flex flex-col flex flex-wrap justify-between'>
                			
<livewire:admin.pages.taken-credit-edit.purchase-main
            :filterBy="['user_purchase_id' => $entity->purchase_id,]" />
                </x-helper.container.container>
        </div>

        <div>
            <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                {{__("Назад")}}
            </x-helper.button.gray_button>
        </div>
    </div>

@endsection

