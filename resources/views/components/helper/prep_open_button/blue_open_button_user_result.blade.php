@props([
"id" => 0
])
<x-helper.button.list_blue_open_button
    :list_button="\App\View\Helper\OpenButton\Models\ResultStudent\ResultStudentOpenButton::getButtons($id)"/>
