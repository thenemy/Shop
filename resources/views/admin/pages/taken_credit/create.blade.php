@extends("admin.layout.create")
@section("action")
    
<livewire:components.drop-down.drop-down-search
            searchByKey='phone'
            dropDownClass='App\Domain\User\Front\Admin\DropDown\UserDropDownSearch'
            
            searchLabel='номеру пользователя'
             />
<livewire:components.drop-down.drop-down-search
            searchByKey='name'
            dropDownClass='App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownSearch'
            
            searchLabel='названию Рассрочки'
             />
<livewire:admin.pages.taken-credit.product-nested
                keyToAttach='products'
                />
@endsection
