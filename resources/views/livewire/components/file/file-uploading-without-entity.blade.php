<div class="w-full main_scope_upload">
    <x-helper.input.input_new_download
        :file="$file_uploaded"
        :uniqueId="$uniqueId"
        :multiple="$multiple" :label="$label"/>
    <input class="hidden" name="file{{\CR::CR}}id_file{{\CR::CR}}{{$keyToAttach}}" value="{{$entityId}}">
    <input class="hidden" name="file{{\CR::CR}}class_name{{\CR::CR}}{{$keyToAttach}}" value="{{$entityClass}}">
</div>

