@props([
"drop",
"chosen"=>""
])
<div {{$attributes->merge(["class"=>"relative inline-block text-left w-max","x-data"=>"{ isOpen: false, selected: ''}" ])}}>
    <div>
        <x-helper.button.drop_down_button
            type="button"
            @click="isOpen = !isOpen"
            @keydown.escape="isOpen = false"
            :name="$chosen->name ?? $drop->name"
        >
            <x-helper.icon.arrow_down/>
        </x-helper.button.drop_down_button>
    </div>

    <div
        x-show="isOpen"
        @click.away="isOpen = false"
        class="drop-down-block ">
        <div class="py-1" role="none">
            <input class="selected_input hidden" type="{{$drop->type}}" name="{{$drop->key}}"
                   @if($chosen) value="{{$chosen->id}}" @endif/>
            {{$slot}}
        </div>
    </div>
</div>

<script>
    $(".drop-down-item").click(function () {
        const parent = $(this).parents();
        $(parent[2]).find(".helper_text").text($(this).text())
        $(parent[0]).find(".selected_input").val($(this).attr("value"))
    });
</script>
