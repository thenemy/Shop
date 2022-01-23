<div class="">
    <x-helper.input.input class="w-14" wire:model="paginate" label='{{__("Показать")}}'/>
    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">
        
            <div 	class='justify-end items-end flex flex-row  space-x-2'>
                			
<x-helper.error.error/>			

            <div >
                			

            <div 	x-data='modalWindow()'>
                			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='open()'>Выставить счет</x-helper.button.base_button>			
<div x-cloak 	x-show='show'><x-helper.modal.modal_base>			

            <div 	class='block p-5 space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Отправка сообщения')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите выставить счёт ?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400'	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='sendNotPaid'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div></x-helper.modal.modal_base></div>
            </div>
            </div>
            </div> </x-helper.table.table>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
</div>
