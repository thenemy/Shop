@props([
'item'
])
<div>
    <div x-data="{ open: '{{$item->isCurrentRoute()}}' }" class="cursor-pointer">
        <div class="drop_element" x-data="{add_style : false}"
             @click="open = ! open"
             @mouseover="add_style = true"
             @mouseleave="add_style = false">
            <div class="hover_side_item">
                <div>
                    <div class="flex items-center justify-between w-full text-lg">
                        <div class="drop_helper_text">
                            <div>
                                     <span
                                         :class="{'text-side_hovering': add_style, 'text-2xl fa-fw ':isSideBarOpen, 'text-xl': !isSideBarOpen }"
                                         class="fas {{$item->icon}}"></span>
                            </div>
                            <div>
                                    <span x-show="!isSideBarOpen"
                                          :class="add_style && 'text-side_hovering'"
                                          class="text-[.860rem] font-medium">{{$item->name}}</span>
                            </div>
                        </div>
                        <div x-show="!isSideBarOpen"
                             :class="open && 'rotate-180'  || 'transform transition  rotate-90' "
                             class="transform  text-[.860rem] text-side_elem transition">
                            <span :class="add_style && 'text-side_hovering'" class="fas fa-arrow-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($item->sublist as $sublist)
            <a href="{{$sublist->route_name}}">
                <div x-show="open && !isSideBarOpen"
                     class="@if($sublist->isCurrentRoute())
                         border-l-4 text-white
                @else
                         text-side_elem
                @endif  bg-open_items p-1 hover:border-l-4 border-side_border">
                    <div class="py-1 ml-3 transform text-sm font-medium hover:translate-x-2
                transition-transform ease-in duration-200">
                        <span>{{$sublist->name}}</span>
                    </div>
                </div>
            </a>

        @endforeach
    </div>
</div>
