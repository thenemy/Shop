@extends("components.helper.table.base_complete_list")
@section("action")
    <div class="self-end">
        <x-helper.button.green_button href="{{$list->add_route}}" class="p-2">
            Создать
        </x-helper.button.green_button>
    </div>
@endsection
