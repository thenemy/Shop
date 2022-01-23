<div>
    
<x-helper.error.error/>
@if($entity->status%10 == 0) 

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Решение')}}</span>
                			

            <div 	data-theme='custom '	class='space-x-4 justify-around flex flex-row  space-x-2'>
                			

            <div 	x-data='modalWindow()'>
                			
<button 	class='btn btn-success'	@click='open()'>{{__('Принять')}}</button>			
<div x-cloak 	x-show='show'><x-helper.modal.modal_base>			

            <div 	class='block p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Принять заказ')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите принять заказ ?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400'	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='acceptPayment'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div></x-helper.modal.modal_base></div>
            </div>			

            <div 	x-data='modalWindow()'>
                			
<button 	class='btn btn-error'	@click='open()'>{{__('Отказать')}}</button>			
<div x-cloak 	x-show='show'><x-helper.modal.modal_base>			

            <div 	class='block p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Отказать рассрочку')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите отклонить заказ ?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400'	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='denyPayment'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div></x-helper.modal.modal_base></div>
            </div>
            </div>
            </div>
 @endif
</div>
