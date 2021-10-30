@props([
"name"=>"Default",
"list"=>[]
])
<div class="shadow-lg">
    <h1 class="font-bold text-2xl p-5 border-b border-gray-200">{{$name}}</h1>
    <div class="flex flex-col ">
        @foreach($list as $item)

            <div class="border-b border-gray-200 hover:bg-blue-100">

                <div x-data="{ open: false }">
                    <button @click="open = ! open">
                        <div
                            class="@if(\Illuminate\Support\Facades\Route::is($item->route_also)) border-l-4 border-blue-400 @endif p-3">
                            <a href="{{$item->route_name}}">{{$item->name}}</a>
                            {{--                            <p>{{$item->name}}</p>--}}
                        </div>
                    </button>
                    @if($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::LIST_SIDEBAR)
                        @foreach($item->sublist as $sublist)
                            <div class="">
                                <div class="text-gray-700 block py-2 pl-8 text-sm" x-show="open"
                                     @click.outside="open = false"><a href="">{{$sublist->name}}</a></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        @endforeach
    </div>
</div>
