<div>
    
@if(abs($entity->status)% 10 == 1) 

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Состояние')}}</span>
                			
<x-helper.text.text_key key="Сальдо" value='{{$entity->saldo ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
@if($entity->status != 11) 			

            <div 	class='m-auto w-2/5'>
                			

            <div 	x-data='modalWindow() '>
                			
<x-helper.button.base_button 	class='bg-red-600 hover:bg-red-400 '	@click='open()'>Аннулировать рассрочку</x-helper.button.base_button>			
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
                			
<span 	class='text-2xl block text-center font-bold'>{{__('Аннулировать рассрочку')}}</span>			
<span 	class='text-lg  font-medium'>{{__('Вы уверены что хотите аннулировать рассрочку?')}}</span>			

            <div 	class='justify-end flex flex-row  space-x-2'>
                			

            <div 	class='self-end'>
                			
<x-helper.button.base_button 	class='bg-gray-600 hover:bg-gray-400 '	@click='show = false'>Нет</x-helper.button.base_button>			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	@click='show = false '	wire:click='annulling'>Да</x-helper.button.base_button>
            </div>
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
 @endif
</div>
