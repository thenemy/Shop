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
            

            <div 	class='mr-4 space-y-10'>
                			

            <div 	class='justify-between flex flex-row  space-x-2'>
                			

            <div 	class='border border-blue-300 p-2 bg-white rounded shadow w-max'>
            <span class='font-bold text-lg'>{{__('Курс валюты')}}</span>
                			
<livewire:components.currency-field.currency/>
            </div>			

            <div 	class='border border-blue-300 p-2 bg-white rounded shadow w-max'>
            <span class='font-bold text-lg'>{{__('Удержка Денег')}}</span>
                			
<livewire:components.currency-field.money/>
            </div>
            </div>			

            <div 	class='w-full flex flex-row  space-x-2'>
                			

            <div 	class='items-center block p-2 bg-white w-full h-full shadow-lg rounded'>
            <span class='font-bold text-lg'>{{__('Статистика')}}</span>
                			

            <div 	class='justify-around w-full flex flex-row  space-x-2'>
                			

            <div 	class='space-x-6 p-5 items-center  flex flex-row  space-x-2'>
                			
<span 	class='fas fa-cash-register text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-start  flex flex-col  space-y-2'>
                			
<span 	class='text-sm text-center font-bold'>{{__('Рассрочки')}}</span>			

            <div 	class='text-sm'>
                			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Всего')}}:</span>			
<span 	class='font-bold'>{{App\Domain\Installment\Entities\TakenCredit::count() ?? ""}}</span>
            </div>			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Сегодня')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
            </div>
            </div>
            </div>
            </div>			

            <div 	class='space-x-6 p-5 items-center  flex flex-row  space-x-2'>
                			
<span 	class='fas fa-address-book text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-start  flex flex-col  space-y-2'>
                			
<span 	class='text-sm text-center font-bold'>{{__('Просроченные рассрочки')}}</span>			

            <div 	class='text-sm'>
                			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Всего')}}:</span>			
<span 	class='font-bold'>{{App\Domain\Installment\Entities\TakenCredit::unpaidCredits() ?? ""}}</span>
            </div>			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Сегодня')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
            </div>
            </div>
            </div>
            </div>			

            <div 	class='space-x-6 p-5 items-center  flex flex-row  space-x-2'>
                			
<span 	class='fas fa-calendar-day text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-start  flex flex-col  space-y-2'>
                			
<span 	class='text-sm text-center font-bold'>{{__('За должность')}}</span>			

            <div 	class='text-sm'>
                			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Всего')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
            </div>			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Сегодня')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
            </div>
            </div>
            </div>
            </div>			

            <div 	class='space-x-6 p-5 items-center  flex flex-row  space-x-2'>
                			
<span 	class='fas fa-user text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-start  flex flex-col  space-y-2'>
                			
<span 	class='text-sm text-center font-bold'>{{__('Пользователей за месяц')}}</span>			

            <div 	class='text-sm'>
                			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.user.index", [])}}"'>
                			
<span >{{__('Всего')}}:</span>			
<span 	class='font-bold'>{{App\Domain\User\Entities\User::allUser() ?? ""}}</span>
            </div>			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.user.index", [])}}"'>
                			
<span >{{__('Сегодня')}}:</span>			
<span 	class='font-bold'>{{App\Domain\User\Entities\User::newToday() ?? ""}}</span>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>			

            <div 	class=' flex flex-row  space-x-2'>
                			
<x-dashboard.bar_chart  />			
<x-dashboard.doughnut_chart/>
            </div>
            </div>
        </div>
    </div>

@endsection

