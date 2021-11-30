@props([
    "table",
    "optional"
])
<div class="flex flex-col">
    <div class="self-end">
        <x-helper.button.main_button href="{{$table->route_create}}">
            {{__("Создать")}}
        </x-helper.button.main_button>
    </div>
    <x-helper.table.table :table="$table" :optional="$optional"/>
</div>
