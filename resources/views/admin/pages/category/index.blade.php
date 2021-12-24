@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('Категории')}}</x-helper.text.title>
        <div class="flex flex-row">
            
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        
<livewire:admin.pages.category.category-index/>
    </div>
@endsection
