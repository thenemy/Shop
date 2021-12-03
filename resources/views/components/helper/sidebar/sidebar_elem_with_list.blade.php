@props([
'item'
])
<div>
    <div x-data="{ open: '{{$item->isCurrentRoute()}}' }" class="cursor-pointer ">
        <div
            class="@if($item->isCurrentRoute())
                bg-gray-200 rounded-md
             text-gray-500 hover:text-gray-800
@else text-gray-500 hover:text-gray-800
        @endif flex flex-row items-center py-2
        transform hover:translate-x-2 transition-transform ease-in px-4 duration-200 ">
            <div>
                <button @click="open = ! open">
                    <div class="inline-flex items-center justify-between w-40 text-lg">
                        <span class="text-sm font-medium">{{$item->name}}</span>
                        <div :class="{'transform transition  rotate-0' : !open}"
                             class="transform  transition  -rotate-90">
                            <img src="{{asset("images/arrows/arrow_down.svg")}}" alt="">
                        </div>
                    </div>

                </button>

            </div>
        </div>

        @foreach($item->sublist as $sublist)
            <div x-show="open" class="@if($sublist->isCurrentRoute())
                bg-blue-400 rounded-md p-1
                text-white
@else
                text-gray-500 hover:text-gray-800
@endif ml-4 ">
                <div class="py-1 ml-3 transform text-sm font-medium hover:translate-x-2
                transition-transform ease-in duration-200">
                    <a href="{{$sublist->route_name}}">{{$sublist->name}}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
