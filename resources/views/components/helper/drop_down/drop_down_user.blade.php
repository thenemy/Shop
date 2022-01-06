@props([
    "user" => collect([])
])
<x-helper.drop_down.drop_down
    :attributes="$attributes"
    :drop="\App\View\Helper\DropDown\Models\User\UserDropDown::getDropDownByModel($user)"/>
