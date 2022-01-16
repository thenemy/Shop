@extends("layout.admin_layout")
@section("content")
    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__("Главная") ?? ""}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        <div class="flex flex-row">
            
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full pb-10 ">
            

            <div 	class='m-4'>
                			

            <div 	class=' flex flex-row  space-x-2'>
                			

            <div 	class='border border-blue-300 p-2 bg-white rounded shadow w-max'>
            <span class='font-bold text-lg'>{{__('Курс валюты')}}</span>
                			
<livewire:components.currency-field.currency/>
            </div>			

            <div 	class='items-center p-2 bg-white h-full shadow-lg rounded'>
            <span class='font-bold text-lg'>{{__('Статистика')}}</span>
                			

            <div 	class=' flex flex-row  space-x-2'>
                			

            <div 	class='cursor-pointer space-x-6 p-5 items-center  flex flex-row  space-x-2'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"  '>
                			
<span 	class='fas fa-cash-register text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-center  flex flex-col  space-y-2'>
                			
<span 	class='font-bold text-2xl'>{{App\Domain\Installment\Entities\TakenCredit::count() ?? ""}}</span>			
<span 	class='text-xs text-center'>{{__('Рассрочки')}}</span>
            </div>
            </div>			

            <div 	class='cursor-pointer space-x-6 p-5 items-center  flex flex-row  space-x-2'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"  '>
                			
<span 	class='fas fa-address-book text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-center  flex flex-col  space-y-2'>
                			
<span 	class='font-bold text-2xl'>{{App\Domain\Installment\Entities\TakenCredit::unpaidCredits() ?? ""}}</span>			
<span 	class='text-xs text-center'>{{__('Просроченные рассрочки')}}</span>
            </div>
            </div>			

            <div 	class='cursor-pointer space-x-6 p-5 items-center  flex flex-row  space-x-2'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"  '>
                			
<span 	class='fas fa-calendar-day text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-center  flex flex-col  space-y-2'>
                			
<span 	class='font-bold text-2xl'>{{0 ?? ""}}</span>			
<span 	class='text-xs text-center'>{{__('За должность')}}</span>
            </div>
            </div>			

            <div 	class='cursor-pointer space-x-6 p-5 items-center  flex flex-row  space-x-2'	onclick='location.href ="{{route("admin.user.index", [])}}"  '>
                			
<span 	class='fas fa-user text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-center  flex flex-col  space-y-2'>
                			
<span 	class='font-bold text-2xl'>{{App\Domain\User\Entities\User::newInMonth() ?? ""}}</span>			
<span 	class='text-xs text-center'>{{__('Пользователей за месяц')}}</span>
            </div>
            </div>
            </div>
            </div>
            </div>			

            <div 	class='mt-10'>
                			
<x-helper.container.container :title='__("Новые рассрочки")' 	class='flex flex-wrap justify-between'>
                			
<livewire:admin.pages.dashboard-main.taken-credit-new
            :filterBy="['new_credit' => 1,]" />
                </x-helper.container.container>
            </div>
            </div>
        </div>
    </div>

@endsection

