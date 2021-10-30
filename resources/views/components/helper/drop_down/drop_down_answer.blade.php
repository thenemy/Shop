@props(
[
"answer"=>"",
"answers"=>[]
]
)
<x-helper.drop_down.drop_down
    :drop="\App\View\Helper\DropDown\Models\TestAnswer\TestDropDown::getDropDownByModel($answers)"
    :attributes="$attributes"
    :chosen="!$answer?'':new \App\View\Helper\DropDown\Items\DropItem($answer->id, $answer->answer)"
/>
