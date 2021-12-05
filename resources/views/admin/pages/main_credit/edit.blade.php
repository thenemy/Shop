@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Введите название' value='{{$entity->name}}'/>
<x-helper.input.input name='helper_text' type='text'  label='Введите условия' value='{{$entity->helper_text}}'/>
<x-helper.input.input name='initial_percent' type='number'  label='Введите первоначальный процент оплаты' value='{{$entity->initial_percent}}'/>
<livewire:admin.pages.main-credit.credit-dynamic-index
                parentKey='main_credit_id'
                :parentId='$entity->id'
            />
@endsection
