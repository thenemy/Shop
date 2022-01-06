<div x-data="{show: false}">
    <span @click="show = !show" class="px-2 inline-flex text-xs bg-{{$color}}-400 leading-5
        font-semibold rounded-full hover:bg-{{$color}}-200 cursor-pointer text-white">
                  {{$slot}}
</span>
    <x-helper.modal.modal_decision :title="__('Изменить статус')"
                                   :show="'show'"
                                   wire:click="{{$click}}"
                                   class="bg-{{$color}}-600 hover:bg-{{$color}}-700"
                                   :attributes="$attributes"
                                   :question="__('Вы уверены что хотите изменить статус?')"/>
</div>


