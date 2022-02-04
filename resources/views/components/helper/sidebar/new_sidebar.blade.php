<div x-cloak class="w-full">
    @foreach($list->sublist as $item)
        @if($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::USUAL_SIDEBAR)
            <x-helper.sidebar.new_sidebar_elem :item="$item"/>
        @elseif($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::LIST_SIDEBAR)
            <x-helper.sidebar.new_sidebar_elem_list :item="$item">
            </x-helper.sidebar.new_sidebar_elem_list>
        @endif
    @endforeach
</div>

