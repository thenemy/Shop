@props([
"list" => []
])
<x-helper.list.complete_list
    :list="new \App\View\Helper\CustomList\Models\Admin\Course\CourseAdminList(collect($list))"/>
