@props([
"drop",
])
<x-helper.drop_down.base_drop_down :drop="$drop" :attributes="$attributes">
    @foreach($drop->items as $item)
        <div x-data="{'showModal' : false}">
            <button @click="showModal = true"
                    value="{{$item->id}}"
                    type="button" class="drop-down-item">
                {{$item->name}}
            </button>
            <x-helper.modal.modal_decision
                :show="'showModal'"
                class="bg-yellow-600 hover:bg-yellow-700"
                :title="__('Действие выбрано')"
                :question="__('Вы уверены что хотите выполнить это действие?')"
                x-on:click='$wire.{{$item->clicked}}'
            />
        </div>
    @endforeach
</x-helper.drop_down.base_drop_down>
