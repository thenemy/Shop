@extends("layout.admin_layout")
@section("content")
    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-1">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>%s</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        <div class="flex flex-row">
            %s
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full pb-10 ">
            %s
        </div>
    </div>

@endsection

