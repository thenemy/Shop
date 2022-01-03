@props([
'item'
])
<div>
    <div x-data="{ open: '{{$item->isCurrentRoute()}}' }" class="cursor-pointer">
        <div class="drop_element" x-data="{add_style : false}"
             @click="open = ! open"
             @mouseover="add_style = true"
             @mouseleave="add_style = false">
            <div
                class="hover_side_item">
                <div>
                    <button class="w-full">
                        <div class="flex items-center justify-between w-full text-lg">
                            <div class="drop_helper_text">
                                <div>
                                     <span :class="add_style && 'text-side_hovering'"
                                           class="text-xl fas {{$item->icon}}"></span>
                                </div>
                                <div>
                                    <span x-show="!isSideBarOpen"
                                          :class="add_style && 'text-side_hovering'"
                                          class="text-sm font-medium">{{$item->name}}</span>
                                </div>
                            </div>
                            <div x-show="!isSideBarOpen"
                                 :class="open && 'rotate-180'  || 'transform transition  rotate-90' "
                                 class="transform  text-side_elem transition">
                                <span :class="add_style && 'text-side_hovering'" class="fas fa-arrow-up"></span>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        @foreach($item->sublist as $sublist)
            <div x-show="open && !isSideBarOpen"
                 onclick="window.location = '{{$sublist->route_name}}'"
                 class="@if($sublist->isCurrentRoute())
                     border-l-4 text-white
                    @else
                     text-side_elem
                    @endif  bg-open_items p-1.5 hover:border-l-4 border-side_border">
                <div class="py-1 ml-3 transform text-sm font-medium hover:translate-x-2
                transition-transform ease-in duration-200">
                    <span>{{$sublist->name}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
