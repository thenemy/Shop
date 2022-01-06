<div>
    @for($i=0; $i < $counter; $i++)
        <input value="{{$value}}">
{{--        <div wire:key="{{$i}}" class='flex flex-col w-full space-y-1'>--}}
{{--            <x-helper.text.pre_title class='self-start'>--}}
{{--                Введите название--}}
{{--            </x-helper.text.pre_title>--}}
{{--            @livewire($s, [], key($i))--}}
{{--        </div>--}}
    @endfor


    <button class="btn  btn-primary " wire:click="addCounter">Add Component</button>
</div>
