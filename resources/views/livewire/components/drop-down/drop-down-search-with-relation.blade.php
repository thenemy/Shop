<div x-data="{
    isParentSet: ' ',
    search: @entangle('search')
}" class="flex flex-row space-x-2 items-end border-2 rounded p-2">
    <x-helper.input.input label='{{__("Поиск по") . " " . $searchLabel}}'
                          wire:model="search"></x-helper.input.input>
    <x-helper.drop_down.drop_down_livewire :drop="$drop">
        <div x-init="$watch('search', search => setDropName('{{$drop->name}}'))"></div>
        <div
            x-init="isParentSet = '{{$drop->name}}'"></div>
    </x-helper.drop_down.drop_down_livewire>
    @if(!empty($filterByAssociated))
        <x-helper.drop_down.drop_down_livewire :drop="$drop_associated">
            <div
                @loading-dropdown="setDropName($event.detail.name)">
                <div
                    x-init="$watch('isParentSet', value => setDropName('{{$drop_associated->name}}'))"></div>
            </div>
        </x-helper.drop_down.drop_down_livewire>
    @endif
    <input type="text" class="hidden" value="{{$initial}}" name="{{$dropDownAssociatedClass::KEY}}">
</div>

