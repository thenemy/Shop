<div
    x-data="{ 'openFilter' : false }"
    :class="openFilter && 'absolute'"
    class="flex  flex-row ml-2 z-50 right-0">
    <div class="transform hover:-translate-y-1 cursor-pointer">
        <div @click="openFilter = !openFilter" class="h-8 w-8 mt-5 flex
         items-center justify-center
         text-sm text-center bg-filter_color text-white rounded">
            <span :class="openFilter && 'fa-times' || 'fa-filter' " class="fa align-middle"></span>
        </div>
    </div>
    <div x-show="openFilter" class="h-full">
        <div class="ml-2 min-h-[90vh] z-100 flex flex-col p-5 w-80 bg-white border">
            <div class="mb-4">
                <x-helper.text.title>
                    {{__("Фильтр")}}
                </x-helper.text.title>
            </div>
            {{$slot}}
        </div>

    </div>
</div>



