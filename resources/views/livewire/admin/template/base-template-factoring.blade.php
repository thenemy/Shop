{{--Index can be accessed--}}
<div>
    @for($index=0; $index < $counter; $index++)
        %s
    @endfor
    <button class="btn" wire:click="addCounter">{{__("Добавить")}}</button>
</div>
