<div
    x-data="{ 'openFilter' : false }"
    class="self-end">
    <div
        class="w-10 self-end transform hover:-translate-y-1 cursor-pointer">
        <div @click="openFilter = !openFilter" class="">
            <img src="{{asset("images/filter.svg")}}"/>
        </div>

    </div>
    <x-helper.modal.modal_show :show="'openFilter'">
        {{$slot}}
    </x-helper.modal.modal_show>
</div>



