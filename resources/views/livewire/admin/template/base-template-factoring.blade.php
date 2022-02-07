{{--Index can be accessed--}}
<x-helper.container.container :title="__('%s')" class="w-full flex flex-col justify-start items-start space-y-2">
    <div class="w-full flex-1 space-y-4">
        {{--        here $index must be id of the object so we could find them
                    and delete it when is needed
        --}}
        @foreach($entities as $index => $entity)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    %s
                </div>
                <div x-data="{ show : false }">
                    <button @click='show = true' class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                    <x-helper.modal.modal_delete
                        type="button"
                        wire:click="removeEntity({{$index}})"
                    />
                </div>
                <div class="hidden" x-data="{id: {{$entity->id ?? "" }} }">
                    <input name="{{$prefixKey}}->{{$index}}->id" :value="id">
                </div>
            </div>
        @endforeach
        @foreach($objects as $index => $value)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    %s
                </div>
                <div>
                    <button wire:click="remove({{$index}})" class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                </div>
                <input class="hidden" name="{{$prefixKey}}_new_created[]" value="{{$index}}">
            </div>
        @endforeach
    </div>
    <button class="btn btn-sm" wire:click="addCounter">{{__("Добавить")}}</button>
</x-helper.container.container>
