@props([
"form",
"enctype" => false,
"method" => "POST",
])
<div class="flex flex-col space-x-20 mx-auto text-center space-y-10">
    <x-helper.text.title>
        {{$form->title}}
    </x-helper.text.title>
    <div class="self-stretch">
        <x-helper.error.error :errors="$errors"/>
        <form method="POST" id="form" class="flex flex-wrap justify-start space-y-5 w-6/12"
              action="{{$form->save_route}}"
              @if($enctype == true) enctype=multipart/form-data @endif>
            @method($method)
            @csrf
            {{$slot}}
            <div class="flex flex-row justify-start space-x-5">
                <div>
                    <x-helper.button.main_button type="submit"
                                                 class="p-2">{{$from->name_save_button}}</x-helper.button.main_button>
                </div>

                <div>
                    <x-helper.button.gray_button type="button" href="{{$form->back_route}}" class="p-2">
                        {{__("Назад")}}
                    </x-helper.button.gray_button>
                </div>

            </div>
        </form>
    </div>
</div>


{{-- probably some code which will send data must be written--}}
