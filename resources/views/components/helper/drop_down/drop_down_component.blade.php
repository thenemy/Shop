<div
    x-data="initDropDown('{{$attributes['wire:model'] ?? ''}}', $wire)"
    class="relative drop_down_init inline-block text-left w-max">
    <div>
        <x-helper.button.drop_down_button
            type="button"
            @click="isOpen = !isOpen"
            @keydown.escape="isOpen = false"
            :name="$chosen->name ?? $drop->name">
            <x-helper.icon.arrow_down/>
        </x-helper.button.drop_down_button>
    </div>

    <div
        x-show="isOpen"
        @click.away="isOpen = false"
        class="drop-down-block ">
        <div class="py-1" role="none">
            <input class="selected_input hidden"
{{--                   wire:model="{{$attributes['wire:model'] ?? ''}}"--}}
{{--                   wire:key="{{$attributes['wire:key'] ?? ''}}"--}}
                   type="{{$drop->type}}" name="{{$drop->key}}"/>
            @foreach($drop->items as $item)
                <button @click="setWireModel({{$item->id}})" type="button" value="{{$item->id}}"
                        class="drop-down-item">
                    {{$item->name}}
                </button>
            @endforeach
        </div>
    </div>
</div>

<script>
    function initDropDown(model_name, wire) {
        $(".drop-down-item").click(function () {
            const parent = $(this).parents();
            $(parent[2]).find(".helper_text").text($(this).text())
            $(parent[0]).find(".selected_input").val($(this).attr("value"))
        });
        window.addEventListener("search_event", function () {
            $(".drop-down-item").click(function () {
                const parent = $(this).parents();
                $(parent[2]).find(".helper_text").text($(this).text())
                $(parent[0]).find(".selected_input").val($(this).attr("value"))
            });
        })
        return {
            isOpen: false,
            setWireModel(id) {
                this.isOpen = false;
                wire.set(model_name, id, true);
            }
        }
    }


</script>
