<div>
    
<x-helper.error.error/>
@if($entity->status % 10 == 0) 

            <div 	class='p-10 w-full text-center '	wire:key='super_secure_key' wire:loading>
                			
<x-helper.spinner.spinner/>
            </div>

            <div 	wire:key='super_secure_key' wire:loading.remove>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Решение')}}</span>
                			

            <div 	data-theme='custom '	class='space-x-4 justify-around flex flex-row  space-x-2'>
                			

            <div 	x-data='modalWindow() '>
                			
<button 	class='btn  btn-success'	@click='open()'>{{__('Принять')}}</button>			
<div x-cloak 	x-show='show'><div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            			

            <div 	class='block p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Принять рассрочку')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите принять рассрочку ?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='acceptInstallment'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>			

            <div 	x-data='{ show: false, reason:{} }'>
                			
<button 	class='btn  btn-error'	@click='show = true'>{{__('Отказать')}}</button>			
<div x-cloak 	x-show='show'><div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            			

            <div 	class='p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Отказать рассрочку')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Укажите причину вашего отказа')}}</span>			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Причина
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='reason[ru]'  label='{{__("на русском языке")}}' value='{{old("reason") ? old("reason")["ru"] ?? $entity->reason["ru"] ?? " " : $entity->reason["ru"] ?? " "}}' x-model=reason.ru /><x-helper.input.input name='reason[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("reason") ? old("reason")["uz"] ?? $entity->reason["uz"] ?? " " : $entity->reason["uz"] ?? " "}}' x-model=reason.uz /><x-helper.input.input name='reason[en]'  label='{{__("in english")}}' value='{{old("reason") ? old("reason")["en"] ?? $entity->reason["en"] ?? " " : $entity->reason["en"] ?? " "}}' x-model=reason.en />
             </div>
            </div>
            			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Отмена</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-red-600 hover:bg-red-400 '	@click='$wire.set(`reason`,reason); show = false; $wire.denyInstallment()'>Отказать</x-helper.button.base_button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>			
@if(!$entity->surety && !$entity->isRequiredSurety()) 
            <div 	x-data='modalWindow() '>
                			
<button 	class='btn  '	@click='open()'>{{__('Требуется поручитель')}}</button>			
<div x-cloak 	x-show='show'><div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            			

            <div 	class='block p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Запросить поручителя')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите запросить поручителя?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='requireSurety'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>			
 @endif
            </div>
            </div>
            </div>
 @endif
</div>
