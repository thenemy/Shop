@extends("layout.admin_layout")
@section("content")
    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__("Главная") ?? ""}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        <div class="flex flex-row">
            
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            

            <div 	class='border border-blue-300 p-2 bg-white rounded shadow w-max'>
            <span class='font-bold text-lg'>{{__('Курс валюты')}}</span>
                			
<livewire:components.currency-field.currency/>
            </div>
        </div>
    </div>

@endsection

