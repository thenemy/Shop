@extends("layout.admin_layout")
@section("content")
    {{--    test blade  create template then fill with variables --}}
    <div class="flex flex-col space-y-1">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{__("Главная") ?? ""}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        <div class="flex flex-row">
            
        </div>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full pb-10 ">
            

            <div 	class='mr-4 space-y-1'>
                			

            <div 	class='w-full flex flex-row  space-x-2'>
                			

            <div 	class='items-center block p-3 bg-white w-full h-full shadow-lg rounded'>
            <span class='font-bold text-[1.09rem]'>{{__('Статистика')}}</span>
                			

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
                			
<span 	class='fas fa-money-bill-wave text-4xl text-[#bebebe]'></span>			

            <div 	class='space-y-0.5 items-start  flex flex-col  space-y-2'>
                			
<span 	class='text-sm text-center font-bold'>{{__('Действующие рассрочки')}}</span>			

            <div 	class='text-sm'>
                			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Количество')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
            </div>			

            <div 	class='cursor-pointer hover:text-blue-300'	onclick='location.href ="{{route("admin.taken_credit.index", [])}}"'>
                			
<span >{{__('Cумма')}}:</span>			
<span 	class='font-bold'>{{0 ?? ""}}</span>
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

