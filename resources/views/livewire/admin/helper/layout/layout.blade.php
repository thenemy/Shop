<div class="flex flex-col mx-auto mt-10  w-10/12 space-y-5">
    <x-helper.drop_down.drop_down_livewire class="w-1/12"
                                           :drop="$drop_down[0]"></x-helper.drop_down.drop_down_livewire>
    <x-helper.list.simple_list :list="$chosen"/>
</div>

