@if($status)
    <x-helper.status.status color="red">
        {{$slot}}
    </x-helper.status.status>
@else
    <x-helper.status.status color="green">
        {{$slot}}
    </x-helper.status.status>
