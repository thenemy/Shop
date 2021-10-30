@props([
"listButton"
])
<div class="self-start items-start flex flex-col space-y-5">
    @foreach($listButton as $button)
        <div>
            <x-helper.button.blue_open_button class="p-2 w-max" href="{{$button->route}}">
                {{$button->name}}
            </x-helper.button.blue_open_button>
        </div>
    @endforeach
</div>
