@extends("admin.layout.create")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите цвета
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='color[ru]'  label='{{__("на русском языке")}}' value='{{old("color") ? old("color")["ru"] ?? $entity->color["ru"] ?? " " : $entity->color["ru"] ?? " "}}' /><x-helper.input.input name='color[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("color") ? old("color")["uz"] ?? $entity->color["uz"] ?? " " : $entity->color["uz"] ?? " "}}' /><x-helper.input.input name='color[en]'  label='{{__("in english")}}' value='{{old("color") ? old("color")["en"] ?? $entity->color["en"] ?? " " : $entity->color["en"] ?? " "}}' />
             </div>
            </div>
            
@endsection
