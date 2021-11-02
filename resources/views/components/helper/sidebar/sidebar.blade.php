@props([
"name"=>"Default",
"list"=>[],
])
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>

<div class="min-h-screen flex flex-row bg-gray-100">
    <div class="flex flex-col w-80 bg-white rounded-r-3xl overflow-hidden">
        <div class="flex items-center justify-center h-20 shadow-md">
            <h1 class="text-3xl uppercase text-indigo-500">Админ</h1>
        </div>
        <ul class="flex flex-col py-4">
            @foreach($list as $item)

                @if($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::USUAL_SIDEBAR)
                    <x-helper.sidebar.sidebar-elem :item="$item"/>
                @elseif($item->getType()==\App\View\Helper\SideBar\Interfaces\SideBarInterface::LIST_SIDEBAR)
                    <x-helper.sidebar.sidebar-elem-with-list :item="$item">
                    </x-helper.sidebar.sidebar-elem-with-list>
                @endif
            @endforeach
        </ul>
    </div>
</div>