@extends("admin.open_layout.create")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите  имя категории
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='name[ru]'  label='{{__("на русском языке")}}' value='{{old("name") ? old("name")["ru"] ?? $entity->name["ru"] ?? " " : $entity->name["ru"] ?? " "}}'/><x-helper.input.input name='name[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("name") ? old("name")["uz"] ?? $entity->name["uz"] ?? " " : $entity->name["uz"] ?? " "}}'/><x-helper.input.input name='name[en]'  label='{{__("in english")}}' value='{{old("name") ? old("name")["en"] ?? $entity->name["en"] ?? " " : $entity->name["en"] ?? " "}}'/>
             </div>
            </div>
            
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='icon->icon'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Загрузите иконку")'
                    :entityId='old("file->id_file->icon->icon") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:admin.pages.category-create.filtration-category-dynamic-without-entity />
@endsection
