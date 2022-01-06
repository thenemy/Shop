@props(
[
"file",
"label",
"multiple",
"uniqueId"
]
)
<div x-data="init('{{$uniqueId}}', @this)"
     id="{{$uniqueId}}"
     uniqueId="{{$uniqueId}}"
     class="w-full file_upload">
    <main
        @change-progress-start.window="setUploading($event)"
        @change-progress-finish.window="stopUploading($event)"
        @change-progress-error.window="stopUploading($event)"
        @change-progress.window="setProgress($event)"
        class="container mx-auto max-w-screen-lg h-full"
    >
        <!-- file upload modal -->
        <article x-show="!isUploading" aria-label="File Upload Modal"
                 class="h-full shadow rounded-md"
                 wire:drop="$emit('file-dropped', $event)"
                 ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                 ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">

            <section class="h-full overflow- p-8 w-full h-full flex flex-col">
                <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                    <p class="mb-3 font-semibold  flex flex-wrap justify-center">
                        <span> {{__("Загрузите ")}} {{$label}}</span>
                    </p>
                    <input
                        id="{{$uniqueId}}"

                        type="file"
                        @if($multiple) multiple @endif
                        class="hidden hidden-input"/>
                    <button
                        class="upload_file_button mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                        {{__('Нажмите для загрузки')}}
                    </button>
                </header>

                @if(!empty($file) && $file[0] && $file[0]->exists())
                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg">
                        {{__("Файлы")}}
                    </h1>
                    <ul class="gallery flex flex-1 flex-wrap -m-1">
                        @foreach($file as $temp)
                            <li>
                                <x-helper.file.file :file="$temp"/>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </section>
        </article>

        <div x-show="isUploading"
             class="w-full p-2 bg-white shadow-lg rounded">
            <div class="text-left ">
                <x-helper.text.pre_title>
                    {{__("Идет загрузка")}}
                </x-helper.text.pre_title>
            </div>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2 text-xs flex rounded bg-purple-200">
                    <div
                        x-bind:style="`width: ${progress}%`"
                        class="shadow-none flex flex-col
                                text-center whitespace-nowrap text-white justify-center bg-purple-500 "></div>
                </div>
            </div>
        </div>
    </main>
</div>


<style>
    .hasImage:hover section {
        background-color: rgba(5, 5, 5, 0.4);
    }

    .hasImage:hover button:hover {
        background: rgba(5, 5, 5, 0.45);
    }

    #overlay p,
    i {
        opacity: 0;
    }

    #overlay.draggedover {
        background-color: rgba(255, 255, 255, 0.7);
    }

    #overlay.draggedover p,
    #overlay.draggedover i {
        opacity: 1;
    }

    .group:hover .group-hover\:text-blue-800 {
        color: #2b6cb0;
    }
</style>
