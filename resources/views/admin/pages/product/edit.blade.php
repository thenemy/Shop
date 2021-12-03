@extends("admin.layout.edit")
@section("action")
    
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_product'
                    entityClass='App\Domain\Product\Product\Front\Main\ProductEdit'
                    :multiple='true'
                    label='Картинки для товара'
                     />
@endsection
