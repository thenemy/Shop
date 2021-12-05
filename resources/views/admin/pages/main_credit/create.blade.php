@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Введите название' value='{{old("name") ?? ""}}'/>
<x-helper.input.input name='helper_text' type='text'  label='Введите условия' value='{{old("helper_text") ?? ""}}'/>
<x-helper.input.input name='initial_percent' type='number'  label='Введите первоначальный процент оплаты' value='{{old("initial_percent") ?? ""}}'/>
@endsection
