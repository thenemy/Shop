@props(['item'])
<a href="{{$item->route_name}}">
    <div x-data="{add_style:false}"
         @mouseover="add_style = true"
         @mouseleave="add_style = false"
         class="
@if($item->isCurrentRoute())
             bg-white border-r-4 @endif drop_element">
        <div class="flex flex-row items-center hover_side_item text-lg">
            <div class="drop_helper_text">
            <span class="@if($item->isCurrentRoute()) text-side_hovering @endif  fas {{$item->icon}}"
                  :class="{'text-side_hovering': add_style, 'text-2xl fa-fw ':isSideBarOpen, 'text-xl': !isSideBarOpen }"></span>
                <span x-show="!isSideBarOpen" :class="add_style && 'text-side_hovering'"
                      class="text-[.860rem] w-full font-medium">{{$item->name}}</span>
            </div>
            <div>
            </div>
        </div>
    </div>

</a>
