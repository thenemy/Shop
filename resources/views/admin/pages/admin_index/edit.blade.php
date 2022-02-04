@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("phone") ?? $entity->phone ?? " "}}' id='phone'  onkeyup="" />
<x-helper.input.input name='password' type='password'
            label='{{__("Пароль")}}' value='' id='password'  onkeyup="" />
<x-helper.drop_down.drop_down :drop='\App\Domain\User\Front\Admin\DropDown\RoleDropDown::getDropDown($entity->role->role)' />
@endsection
