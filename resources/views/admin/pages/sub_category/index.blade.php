@extends("admin.open_layout.index")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__("Подкатегории от") ?? ""}} {{App\Domain\Category\Front\SubCategory\SubCategory::find($params)->name_current ?? ""}}</x-helper.text.title>
        <div class="flex flex-row">
            
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            
<livewire:admin.pages.sub-category.sub-category
            :filterBy="['parent_id' => $params,]" />
        </div>
    </div>
@endsection
