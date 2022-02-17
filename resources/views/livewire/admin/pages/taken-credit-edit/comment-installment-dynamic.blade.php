<div class="flex flex-col space-y-2">
    {{--   table -> drop down action --}}
    <x-helper.error.error :error="$errors"/>
    <x-comment.comment_table
                :collection="$collection"
                :table="$table"
                :storedValues="$storedValues"
                :optional="$optional">
            <div 	class='items-end justify-end flex flex-row  space-x-2'>
                			

            <div 	x-data='modalWindow() '>
                			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='open()'>Добавить</x-helper.button.base_button>			
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
            			

            <div 	class='p-5 w-[40vw] space-y-4'>
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Оставить комментарий')}}</span>			
<x-helper.text_area.text_area name='' label='' 	wire:model.defer='entity.comment'></x-helper.text_area.text_area>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Закрыть</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	wire:click='save'	@click='show = false'>Добавить</x-helper.button.base_button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>
            </div></x-comment.comment_table>
</div>
