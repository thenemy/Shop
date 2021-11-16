@props(["table" ])
<div
    {{$attributes->merge(["class"=>"flex flex-col  w-10/12 mt-14 mx-auto space-y-2 "])}}>

    @yield("action")
    <x-helper.list.simple_list :list="$table->items"/>
    @yield("pagination")
</div>
