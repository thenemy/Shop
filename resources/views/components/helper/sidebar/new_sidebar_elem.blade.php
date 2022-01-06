@props(['item'])
<div x-data="{add_style:false}" onclick="location.href= '{{$item->route_name}}'"
     @mouseover="add_style = true"
     @mouseleave="add_style = false"
     class="
@if($item->isCurrentRoute())
         bg-white border-r-4 @endif drop_element">
    <div class="flex flex-row items-center hover_side_item">
        <div class="drop_helper_text">
            <span class="@if($item->isCurrentRoute()) text-side_hovering @endif text-xl fas {{$item->icon}}" :class="add_style && 'text-side_hovering'"></span>
            <span x-show="!isSideBarOpen" :class="add_style && 'text-side_hovering'"
                  class=" text-sm w-full font-medium">{{$item->name}}</span>
        </div>
    </div>
</div>
