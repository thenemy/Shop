@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Введите название' value='{{old("name") ?? ""}}'/>
<x-helper.text_area.text_area name='helper_text' label='Введите условия'>{{old("helper_text")}}</x-helper.text_area.text_area>
<x-helper.input.input name='initial_percent' type='number'  label='Введите первоначальный процент оплаты' value='{{old("initial_percent") ?? ""}}'/>
@endsection
