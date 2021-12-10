@extends("admin.open_layout.index")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('Под категория')}}</x-helper.text.title>
        {{--    insert name of the breadcrumbs and the arguments--}}
        
<livewire:admin.pages.category-open.category-open
            :filterBy="['parent_id' => $params,]" />
    </div>
@endsection