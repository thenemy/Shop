@extends("admin.open_layout.edit")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Введите  имя категории' value='{{$entity->name}}'/>
<livewire:admin.pages.category-edit.filtration-category-dynamic
                parentKey='category_id'
                :parentId='$entity->id'
            />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='icon_file'
                    entityClass='App\Domain\Category\Front\Main\CategoryEdit'
                    :multiple='false'
                    label='Иконка'
                     />
@endsection
