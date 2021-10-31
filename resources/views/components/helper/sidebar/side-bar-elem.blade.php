@props(['item'])
<div onclick="location.href= '{{$item->route_name}}'"
     class="@if($item->isCurrentRoute()) bg-blue-400 rounded-md @endif flex flex-row items-center h-12 transform hover:translate-x-2 cursor-pointer transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
    <div>
         <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                 class="bx bx-home"></i></span>
        <span class="@if($item->isCurrentRoute()) text-white @endif text-sm font-medium">{{$item->name}}</span>
    </div>
</div>
