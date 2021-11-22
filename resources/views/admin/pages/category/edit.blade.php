@extends("admin.layout.edit")
@section("action")
    
<livewire:admin.pages.category.category-nested
                :attachEntityId='$entity->id'
                :attachEntity='get_class($entity)'
                keyToAttach='attachCategory'
                />
<img class="items-center justify-center object-fill w-10 h-10" src=""/>

@endsection
