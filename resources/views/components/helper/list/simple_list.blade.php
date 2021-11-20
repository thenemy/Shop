@props(["table" => []])
<table class="table-auto border-collapse border w-full">
    <x-helper.list.select_operations />
    <tr class="w-8/12">
        <th class="py-3 px-6 hidden checkbox-show">выбрать</th>
        <th class="py-3 px-6">№</th>
        <th class="py-3 px-6 ">Название</th>
        <th class="py-3 px-6 ">Действие</th>
    </tr>
    @section("actions")
        @foreach($list as $item)
            <tr class="w-8/12 text-center border-b border-gray-200 hover:bg-gray-100">
                <td class="p-2 hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" class="form-checkbox w-5 h-5"/>
                    </label>
                </td>

                <td class="p-2 ">
                    <label for="check{{$loop->index}}">
                        {{$item->id}}
                    </label>
                </td>
                <td class="p-2 ">
                    <label for="check{{$loop->index}}">
                        {{$item->name}}
                    </label>
                </td>
                <td class="py-3 px-6 text-center">
                    <label for="check{{$loop->index}}">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                    </label>
                </td>
                <td class="p-1 flex flex-row items-center justify-center h-full py-1 px-6">
                    @if($item->edit_route)
                        <div>
                            <a href="{{$item->edit_route}}" class="tex-sm p-1">

                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <img src="{{asset('images/edit.svg')}}" alt="">
                                </div>

                            </a>
                        </div>
                    @endif
                    @if($item->delete_route)
                        <form method="POST" action="{{$item->delete_route}}">
                            @method("DELETE") @csrf
                            <button class="p-1">
                                <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110 ">
                                    <img src="{{asset('images/trash.svg')}}" alt="">
                                </div>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    @show

</table>
