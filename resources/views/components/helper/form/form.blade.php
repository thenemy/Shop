@props([
"form",
"enctype" => false,
"method" => "POST",
])
<div class="flex flex-col mx-auto text-center space-y-10 w-full">
    <x-helper.text.title>
        {{$form->title}}
    </x-helper.text.title>
    <div class="self-stretch">
        <x-helper.error.error :errors="$errors"/>
        <form method="POST" id="form" class="flex flex-wrap justify-start space-y-5 w-full"
              action="{{$form->route_save}}"
              @if($enctype == true) enctype=multipart/form-data @endif>
            @method($method)
            @csrf
            {{$slot}}
            <div class="flex flex-row justify-start space-x-5">
                <div>
                    <x-helper.button.main_button type="submit"
                                                 class="p-2">{{$form->name_save_button}}</x-helper.button.main_button>
                </div>

                <div>
                    <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                        {{__("Назад")}}
                    </x-helper.button.gray_button>
                </div>

            </div>
        </form>
    </div>
</div>


{{-- probably some code which will send data must be written--}}
