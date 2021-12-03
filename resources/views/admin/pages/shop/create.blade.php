@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name_user' type='text'  label='Имя пользователя' value=''/>
<x-helper.input.input name='password_user' type='password'  label='Пароль' value=''/>
<x-helper.input.input name='phone_user' type='text'  label='Телефон пользователя' value=''/>
<x-helper.input.input name='name' type='text'  label='Введите название магазина' value=''/>
@endsection
