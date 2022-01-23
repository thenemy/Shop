@props([
'title' => "",
'question'=> "",
'show' => ""
])
<div
    x-show="{{$show}}"
    x-cloak
    class="fixed z-10 h-full w-full inset-0 hide_during_loading hidden overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-max sm:w-full">
            <div class=" flex flex-col space-y-3 p-5 justify-between">
                <div class="flex flex-col space-y-3">
                    <div class="self-center">
                        <x-helper.error.error></x-helper.error.error>
                        <x-helper.text.title>
                            {{$title}}
                        </x-helper.text.title>
                    </div>
                        {{$slot}}
                </div>
                <div class="self-end justify-self-end">
                    <div class="flex flex-row space-x-2">
                        <x-helper.button.gray_button
                            @click="{{$show}} = false">
                            {{__("Назад")}}
                        </x-helper.button.gray_button>
                        <x-helper.button.main_button
                            :attributes="$attributes"
                        >
                            {{__("Сохранить")}}
                        </x-helper.button.main_button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

