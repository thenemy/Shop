@extends("layout.admin_layout")
@section("content")
    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__("Рассрочка") ?? ""}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        <div class="flex flex-row">
            <livewire:components.schema-sms.schema-sms-livewire selected_class='App\Domain\SchemaSms\Entities\SchemaSmsInstallment' />
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full pb-10 ">
            
<livewire:admin.pages.taken-credit.taken-credit-index
            :filterBy="['filter' => 1,'not_waited' => 1,]" />
        </div>
    </div>

@endsection

