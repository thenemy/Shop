@props(["banner_list" =>[]])
<div {{$attributes->merge(["class"=>"w-10/12 mt-14 mx-auto"])}} >
    <x-helper.list.simple_list :list="$banner_list"/>
</div>
