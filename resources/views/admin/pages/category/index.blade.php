@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('asd')}}</x-helper.text.title>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <livewire:admin.pages.category.category-index/>
    </div>
@endsection
