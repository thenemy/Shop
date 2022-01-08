<div x-data="{}" class="flex flex-row space-x-2 items-end border-2 rounded p-2">
    <x-helper.input.input @keydown="$wire.set('resetDropDown', false)"
                          label='{{__("Поиск по") . " " . $searchLabel}}'
                          wire:model="search"></x-helper.input.input>
    <x-helper.drop_down.drop_down_livewire :drop="$drop"/>
    {{--    @else--}}
    {{--        <div class="flex justify-center items-center">--}}
    {{--            <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full" role="status">--}}
    {{--                <span class="visually-hidden">{{__("")}}</span>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    @if(!empty($filterByAssociated))
        <x-helper.drop_down.drop_down_livewire :drop="$drop_associated"/>
    @endif
    <input type="text" class="hidden" value="{{$initial}}" name="{{$dropDownAssociatedClass::KEY}}">
</div>

