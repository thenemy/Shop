@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'  label='Имя пользователя' value='{{old("name") ?? ""}}'/>
<x-helper.input.input name='password' type='password'  label='Пароль' value='{{old("password") ?? ""}}'/>
<x-helper.input.input name='phone' type='text'  label='Телефон пользователя' value='{{old("phone") ?? ""}}'/>
@endsection
