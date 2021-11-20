@props(['item',
'sublist'])
<div x-data="{ open: false }" class="cursor-pointer">

    <div
        class="@if($item->isCurrentRoute()) bg-blue-400 rounded-md @endif flex flex-row items-center h-12
        transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
        <div>
            <button @click="open = ! open">
        <span class="inline-flex items-center justify-center  h-12 w-12 text-lg text-gray-400"><i
                class=" @if(\Illuminate\Support\Facades\Route::is($item->route_also)) bg-white  @endif bx bx-home"></i></span>
                <span class="text-sm font-medium">{{$item->name}}</span>
            </button>
        </div>
    </div>

    @foreach($item->sublist as $sublist)
        <div x-show="open" @click.outside="open = false" class="@if($item->isCurrentRoute()) bg-blue-400 rounded-md @endif">
            <div
                class="@if($item->isCurrentRoute()) bg-blue-400 rounded-md @endif h-7 pl-16 transform text-sm font-medium hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <a href="">{{$sublist->name}}</a>
            </div>
        </div>
    @endforeach
</div>
