@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Имя пользователя' value='{{$entity->name}}'/>
<x-helper.input.input name='password' type='password'  label='Пароль' value=''/>
<x-helper.input.input name='phone' type='text'  label='Телефон пользователя' value='{{$entity->phone}}'/>
@endsection
