<div  x-data="initSchemaSMS( @entangle('comment').defer)" x-init="setComponent({{$entities->first()->type}},
                '{{str_replace(array("'", "\""), "", $entities->first()->schema)}}')">
    <x-helper.button.main_button @click="show = true">
        {{__("Шаблон для Смс")}}
    </x-helper.button.main_button>
    <x-helper.modal.modal_save
        wire:click="$refresh"
        @click="close($wire)"
        :show="'show'"
        :title="__('Шаблоны Смс')">
        <div wire:loading.class="opacity-80">
            <div class="flex flex-row w-full">
                @foreach($entities as $value)
                    <div wire:key="sms_category_{{$value->id}}" class="
                    @if($loop->first) border-l-2 @else  border-l  @endif
                    @if($loop->last) border-r-2 @else border-r @endif border-t-2 p-2 cursor-pointer"
                         :class="type !== {{$value->type}} && 'border-b-2'"
                         @click="setComponent({{$value->type}},'{{$value->schema}}');">
                        <span class="text-gray-500 font-bold">{{$value->name_schema}}</span>
                    </div>
                @endforeach
            </div>
            <div class="border-l-2 border-r-2 border-b-2 p-2">
                <div class="flex flex-row space-x-2">
                    <div class="flex-1 w-full">
                        <x-helper.text_area.text_area x-model="comment"
                                                      type="text"></x-helper.text_area.text_area>
                    </div>
                    @foreach($entities as $value)
                        <div class="flex flex-wrap max-w-xs" wire:key="sms_type_{{$value->id}}"
                             x-show="type === {{$value->type}}">
                            @foreach($value->type_schema as  $type)
                                <button @click="setToComment('{{$type->value}}')"
                                        class="m-1 bg-blue-500 h-10 w-max rounded-full p-2">
                                    <span class="text-white text-sm">{{$type->name}}</span>
                                </button>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-helper.modal.modal_save>

</div>

