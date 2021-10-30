@props([
"file",
"template"=>false,
])
<div class="w-80 bg-blue-light-100 p-5 flex-row justify-between items-center  flex">
    <div class="flex-none flex flex-col space-y-2 text-left">
        <div class="info">
            <input id=fileStore type="file" name="{{$file->key ?? ""}}" class="hidden"/>
            <h1 class="font-bold">Название документа</h1>
            <p class="text-custom-gray-500 text-sm">{{$file->filename ?? ""}}</p>
        </div>
        @if(($file->path ?? false) && !$template)
            <a href="{{route("download",["path"=>$file->path])}}"
               class="text-blue-light-200 cursor-pointer">скачать документ</a>
        @endif
    </div>
    <div>
        <img src="{{asset("images/files.svg")}}" alt="file">
    </div>
</div>
