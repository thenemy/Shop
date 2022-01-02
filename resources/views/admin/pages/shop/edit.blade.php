@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='Имя Магазина' value='{{old("name") ?? $entity->name ?? " "}}' id='name'  onkeyup=""/>
<x-helper.input.input name='user->phone' type='text'
            label='Телефон пользователя' value='{{old("user->phone") ?? $entity->user->phone ?? " "}}' id='user->phone'  onkeyup=""/>
<x-helper.input.input name='user->password' type='password'
            label='Пароль' value='' id='user->password'  onkeyup=""/>
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
