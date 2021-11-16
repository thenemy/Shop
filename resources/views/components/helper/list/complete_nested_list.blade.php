@extends("components.helper.table.base_complete_list")
@section("action")
    <div class="self-stretch flex flex-row justify-between">
        <div>
            <x-helper.button.gray_button href="{{$list->back_route}}" class="p-2">
                Назад
            </x-helper.button.gray_button>
        </div>
        <div>
            <x-helper.button.green_button href="{{$list->add_route}}" class="p-2">
                Создать
            </x-helper.button.green_button>
        </div>

    </div>
@endsection
