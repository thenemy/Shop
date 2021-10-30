@props(
[
"category"=>""
]
)
<x-helper.drop_down.drop_down
    :drop="\App\View\Helper\DropDown\Models\Category\CategoryDropDown::getDropDown()"
    :attributes="$attributes"
    :chosen="!$category?'':new \App\View\Helper\DropDown\Items\DropItem($category->id, $category->name)"
/>
