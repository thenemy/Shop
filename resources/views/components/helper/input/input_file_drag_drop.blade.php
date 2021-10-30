@props([
"file",
"multiple" => false,
"multiple_key"
])
<div class="flex flex-col space-y-5 file_parent">
    <template class="files">
        @if($multiple)
            <x-helper.file.file :file="$file->first()->files" :template="true"/>
        @else
            <x-helper.file.file :file="$file" :template="true"/>
        @endif

    </template>

    <div class="container-files">
        @if($multiple && $file->first()->files->filename)
            @foreach($file as $item)
                <x-helper.file.file :file="$item->files"/>
            @endforeach
        @else
            @if(!$multiple &&  $file->filename)
                <x-helper.file.file :file="$file"/>
            @endif

        @endif
    </div>

    <div class="w-96 bg-custom-gray-100  flex flex-col space-y-5 p-5" ondrop="dropHandler(event);"
         ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);"
         ondragenter="dragEnterHandler(event);">
        <div class="self-start">
            <p>Документы</p>
        </div>
        <div class="flex flex-row space-x-2 items-center">
            <div>
                <input type="file" name="@if($multiple){{$file->first()->files->key . "[]"}}@else{{$file->key}}@endif"
                       class="hidden fileInput"
                       @if($multiple) multiple @endif/>
                <button type="button" class="bg-white text-black hover:bg-gray-50 text-sm p-1.5 fileButton">Выберите
                    файл
                </button>
            </div>
            <p> или Перетащите файл сюда</p>
        </div>
    </div>
</div>


