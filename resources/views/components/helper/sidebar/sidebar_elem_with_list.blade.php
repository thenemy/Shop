@props([
'item'
])
<div>
    <div x-data="{ open: '{{$item->isCurrentRoute()}}' }" class="cursor-pointer ">
        <div
            class="@if($item->isCurrentRoute()) bg-gray-200 rounded-md text-gray-500 hover:text-gray-800
        @else text-gray-500 hover:text-gray-800
        @endif py-2
        transform hover:translate-x-2 transition-transform ease-in px-4 duration-200 ">
            <div>
                <button @click="open = ! open" class="w-full">
                    <div class="flex items-center justify-between w-full text-lg">
                        <div>
                            <span class="text-sm font-medium">{{$item->name}}</span>
                        </div>
                        <div :class="{'transform transition  rotate-0' : !open}"
                             class="transform  transition  -rotate-90">
                            <img src="{{asset("images/arrows/arrow_down.svg")}}" alt="">
                        </div>
                    </div>

                </button>

            </div>
        </div>

        @foreach($item->sublist as $sublist)
            <div x-show="open"
                 onclick="window.location = '{{$sublist->route_name}}'"
                 class="@if($sublist->isCurrentRoute())
                     bg-blue-400 rounded-md p-1
                     text-white
@else
                     text-gray-500 hover:text-gray-800
@endif ml-4 ">
                <div class="py-1 ml-3 transform text-sm font-medium hover:translate-x-2
                transition-transform ease-in duration-200">
                    <span>{{$sublist->name}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
