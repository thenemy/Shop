<div class="w-full">
    <div class="shadow-lg">
        <div class="bg-white rounded-r-3xl overflow-hidden">
            <ul class="w-full py-4">
                <livewire:components.currency-field.currency/>
                {{--                <x-helper.sidebar.sidebar_elem :item="$list->sidebar"/>--}}
                @foreach($list->sublist as $item)
                    @if($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::USUAL_SIDEBAR)
                        <x-helper.sidebar.sidebar_elem :item="$item"/>
                    @elseif($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::LIST_SIDEBAR)
                        <x-helper.sidebar.sidebar_elem_with_list :item="$item">
                        </x-helper.sidebar.sidebar_elem_with_list>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
