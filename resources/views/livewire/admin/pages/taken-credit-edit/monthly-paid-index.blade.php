<div class="">

    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">
        
            <div 	class='justify-end items-end flex flex-row  space-x-2'>
                			
<x-helper.error.error/>			

            <div >
                			

            <div 	x-data='modalWindow() '>
                			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='open()'>Выставить счет</x-helper.button.base_button>			
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
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Отправка сообщения')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите выставить счёт ?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='sendNotPaid'>Да</x-helper.button.base_button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>
            </div>
            </div> </x-helper.table.table>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
</div>
