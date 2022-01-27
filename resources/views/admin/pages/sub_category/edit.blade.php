@extends("admin.open_layout.edit")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите  имя категории
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='name[ru]'  label='{{__("на русском языке")}}' value='{{old("name") ? old("name")["ru"] ?? $entity->name["ru"] ?? " " : $entity->name["ru"] ?? " "}}' /><x-helper.input.input name='name[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("name") ? old("name")["uz"] ?? $entity->name["uz"] ?? " " : $entity->name["uz"] ?? " "}}' /><x-helper.input.input name='name[en]'  label='{{__("in english")}}' value='{{old("name") ? old("name")["en"] ?? $entity->name["en"] ?? " " : $entity->name["en"] ?? " "}}' />
             </div>
            </div>
            
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='icon_file'
                    entityClass='App\Domain\Category\Front\Main\CategoryEdit'
                    :multiple='false'
                    label='Иконка'
                     />
<livewire:admin.pages.category-edit.filtration-key-category-dynamic 
                 parentKey='category_id'
                :parentId='$entity->id'/>
@endsection
