@props([
    "name"=>""
])
<button {{$attributes->merge(["class"=>"drop-down-button z-index-0" , "type"=>"button"])}}>
    <span class="helper_text text-xs" x-text="name"></span>
    {{$slot}}
</button>
