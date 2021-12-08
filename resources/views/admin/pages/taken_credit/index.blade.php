@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__('Рассрочка')}}</x-helper.text.title>
        {{--    insert name of the breadcrumbs and the arguments--}}
        
<livewire:admin.pages.taken-credit.taken-credit-index/>
    </div>
@endsection
