@props(
[
"course"=>""
]
)
<x-helper.drop_down.drop_down
    :drop="\App\View\Helper\DropDown\Models\Course\CourseDropDown::getDropDown()"
    :attributes="$attributes"
    :chosen="!$course?'':new \App\View\Helper\DropDown\Items\DropItem($course->id, $course->name)"
/>
