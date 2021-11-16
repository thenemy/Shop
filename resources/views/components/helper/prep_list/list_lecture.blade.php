@props([
"table" => []
])
<x-helper.list.complete_list_pagination
    :list="new \App\View\Helper\CustomList\Models\Admin\Lecture\LectureAdminList($table)"/>
