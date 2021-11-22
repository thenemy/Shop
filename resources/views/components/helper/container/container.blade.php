<div x-data="{open:false}" class="flex flex-col space-y-5">
    <div class="flex flex-col cursor-pointer">
        <div @click="open = ! open" class="flex flex-row justify-between items-center">
            <div>
                <span>{{$title}}</span>
            </div>
            <div class="w-5">
                <img class="w-4/5 transform transition rotate-0 duration-300" :class="{'rotate-180': open}"
                     src="{{asset("images/arrows/arrow_down.svg")}}" alt="drop_down_below">
            </div>
        </div>
    </div>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:leave="transition ease-in duration-100">
        {{$slot}}
    </div>
    <hr class="h-1">
</div>
