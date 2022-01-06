@props([
"file",
"multiple" => false,
"multiple_key"
])
<div class="flex flex-col space-y-5 file_parent">
    <template class="files">
        <x-helper.file.file :file="new \App\Domain\Core\Media\Models\Media('' ,'')" :template="true"/>
    </template>
    <div class="container-files">
        @if($multiple && $file->first()->file->filename)
            @foreach($file as $item)
                <x-helper.file.file :file="$item->file"/>
            @endforeach
        @else
            @if(!$multiple &&  $file->filename)
                <x-helper.file.file :file="$file"/>
            @endif
        @endif
    </div>
    <div class="justify-start">
        <p>
            Загрузите файлы
        </p>
    </div>
    <div
        class="w-full bg-custom-gray-100 border-dashed border-4 border-light-blue-500 justify-center items-center  flex flex-col space-y-5 p-5"
        ondrop="dropHandler(event);"
        ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);"
        ondragenter="dragEnterHandler(event);">
        <div>
            <img class="justify-center items-center w-10 border-dashed" src="{{asset('images/file_upload.png')}}"
                 alt="">
        </div>
        <div>
            <span class="text-black text-opacity-50">Перетащите файл сюда
            <br>
             или
            </span>

        </div>
        <div class="flex flex-row space-x-2 items-center">
            <div>
                <input type="file" name="@if($multiple){{$file->first()->files->key . "[]"}}@else{{$file->key}}@endif"
                       class="hidden fileInput"
                       @if($multiple) multiple @endif/>
                <button type="button"
                        class="bg-white font-semibold rounded text-white bg-blue-500 text-sm p-1.5 fileButton">
                    Выберите файл
                </button>
            </div>
        </div>
    </div>
</div>
