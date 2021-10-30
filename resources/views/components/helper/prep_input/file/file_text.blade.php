@props([ "file", "multiple"=>false, "multiple_key"=>""])
<x-helper.text.pre_title>{{$slot}}</x-helper.text.pre_title>
<x-helper.input.input_file_drag_drop :file="$file" :multiple="$multiple" :multiple_key="$multiple_key"/>
