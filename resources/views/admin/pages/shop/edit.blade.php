@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='name_user' type='text'  label='Имя пользователя' value='{{$entity->name_user}}'/>
<x-helper.input.input name='password_user' type='password'  label='Пароль' value='{{old("password_user") ?? ""}}'/>
<x-helper.input.input name='phone_user' type='text'  label='Телефон пользователя' value='{{$entity->phone_user}}'/>
<x-helper.input.input name='name' type='text'  label='Введите название' value='{{$entity->name}}'/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Фото магазина'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='logo_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Лого Магазина'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='document_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Документы'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='licence_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Лицензия'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Паспорт директора'
                     />
@endsection
