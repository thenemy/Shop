@props(["list" => []])
<table class="table-auto border-collapse border w-full">
    <tr class="w-8/12">
        <th class="p-2 border">№</th>
        <th class="p-2 border">Название</th>
        <th class="p-2 border">Действие</th>
    </tr>
    @foreach($list as $item)
        <tr class="w-8/12 text-center">

            <td class="p-2 border">{{$item->id}}</td>
            <td class="p-2 border">{{$item->name}}</td>
            <td class="p-2 flex flex-row justify-around h-full  border-b">
                @if($item->edit_route)
                    <div>
                        <x-helper.button.main_button href="{{$item->edit_route}}" class="tex-sm p-1">
                            Изменить
                        </x-helper.button.main_button>
                    </div>
                @endif
                @if($item->delete_route)
                    <form method="POST" action="{{$item->delete_route}}">
                        @method("DELETE") @csrf
                        <x-helper.button.red_button class="tex-sm p-1">
                            Удалить
                        </x-helper.button.red_button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>
