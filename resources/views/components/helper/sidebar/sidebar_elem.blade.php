@props(['item'])
<div onclick="location.href= '{{$item->route_name}}'"
     class="@if($item->isCurrentRoute()) bg-blue-300 rounded-md @endif flex flex-row items-center py-2
     transform hover:translate-x-2 w-60 p-4 cursor-pointer transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
    <div>
        <span class="@if($item->isCurrentRoute()) text-white @endif text-sm w-full font-medium">{{$item->name}}</span>
    </div>
</div>
