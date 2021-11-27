@extends("admin.layout.edit")
@section("action")
    
<livewire:admin.pages.category.category-nested
                :attachEntityId='$entity->id'
                :attachEntity='get_class($entity)'
                keyToAttach='attachCategory'
                :filterBy='["parent_id" => "$entity->id"]'
                />
<x-helper.input.input name='name' type='text' value='{{$entity->name}}' />
@endsection
