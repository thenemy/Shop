@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('%s')}}</x-helper.text.title>
        <div class="flex flex-row">
            %s
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        %s
    </div>
@endsection
