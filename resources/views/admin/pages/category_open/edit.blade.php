@extends("admin.open_layout.edit")
@section("action")
    
<livewire:admin.pages.category.category-nested
                :attachEntityId='$entity->id'
                :attachEntity='get_class($entity)'
                keyToAttach='attachCategory'
                :filterBy='["parent_id" => "$entity->id"]'
                />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='icon_file'
                    entityClass='App\Domain\Category\Front\Main\CategoryEdit'
                    :multiple='false'
                    label='Иконка'
                     />
@endsection
