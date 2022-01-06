@props([
"id" => 0
])
<x-helper.button.list_blue_open_button
    :list_button="\App\View\Helper\OpenButton\Models\Course\CourseOpenButton::getButtons($id)">
</x-helper.button.list_blue_open_button>
