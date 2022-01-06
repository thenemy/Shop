<div class="flex flex-row space-x-2 items-end border-2 rounded p-2">
    <x-helper.input.input label='{{__("Поиск по") . " " . $searchLabel}}' wire:model="search"></x-helper.input.input>
    <x-helper.drop_down.drop_down_livewire :drop="$drop"/>
    @if(!empty($filterByAssociated))
        <x-helper.drop_down.drop_down_livewire :drop="$drop_associated"/>
    @endif
    <input type="text" class="hidden" value="{{$initial}}" name="{{$dropDownAssociatedClass::KEY}}">
</div>

