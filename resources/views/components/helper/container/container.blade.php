<div x-data="{open:false}" class="flex flex-col space-y-2 w-full bg-white p-4 rounded shadow">
    <div class="flex flex-col cursor-pointer">
        <div @click="open = ! open" class="flex flex-row justify-between items-center">
            <div>
                <x-helper.text.text_lg>{{$title}}</x-helper.text.text_lg>
            </div>
            <div class="w-5">
                {{--                <img class="w-4/5 transform transition rotate-0 duration-300" :class="{'rotate-180': open}"--}}
                {{--                     src="{{asset("images/arrows/arrow_down.svg")}}" alt="drop_down_below">--}}
                <div :class="open && 'transform transition rotate-270'  || 'transform transition rotate-180' "
                     class="transform transition  ">
                    <span class="fas fa-arrow-up"></span>
                </div>
            </div>
        </div>
        <hr class="border-dashed border-title_color">
    </div>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:leave="transition ease-in duration-100">
        <div {{$attributes}}>
            {{$slot}}
        </div>

    </div>

</div>
