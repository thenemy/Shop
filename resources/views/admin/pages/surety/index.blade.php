@extends("admin.open_layout.index")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('Поручители')}}</x-helper.text.title>
        {{--    insert name of the breadcrumbs and the arguments--}}
        
<livewire:admin.pages.surety-open-index.surety-open-index
            :filterBy="['user_id' => $params,]" />
    </div>
@endsection
