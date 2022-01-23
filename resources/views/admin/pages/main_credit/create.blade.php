@extends("admin.layout.create")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите название
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='name[ru]'  label='{{__("на русском языке")}}' value='{{old("name") ? old("name")["ru"] ?? $entity->name["ru"] ?? " " : $entity->name["ru"] ?? " "}}' /><x-helper.input.input name='name[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("name") ? old("name")["uz"] ?? $entity->name["uz"] ?? " " : $entity->name["uz"] ?? " "}}' /><x-helper.input.input name='name[en]'  label='{{__("in english")}}' value='{{old("name") ? old("name")["en"] ?? $entity->name["en"] ?? " " : $entity->name["en"] ?? " "}}' />
             </div>
            </div>
            
<x-helper.text_area.text_area name='helper_text' label='Введите условия'>{{old("helper_text") ?? $entity->helper_text ?? " "}}</x-helper.text_area.text_area>
<x-helper.input.input name='initial_percent' type='number'
            label='{{__("Введите первоначальный процент оплаты")}}' value='{{old("initial_percent") ?? $entity->initial_percent ?? " "}}' id='initial_percent'  onkeyup=""/>
<livewire:admin.pages.main-credit.credit-dynamic-without-entity />
@endsection
