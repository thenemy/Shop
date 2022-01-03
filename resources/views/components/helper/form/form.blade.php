@props([
"form",
"enctype" => false,
"method" => "POST",
])
<div class="flex flex-col pb-10 items-center justify-center text-center space-y-4 mr-4">
    <x-helper.text.title>
        {{$form->title}}
    </x-helper.text.title>
    <hr class="w-full border-dashed border-title_color"/>
    <div class="self-stretch rounded bg-white shadow">
        <x-helper.error.error :errors="$errors"/>
        <form method="POST" id="form" class="flex flex-col justify-center items-center space-y-5 w-full"
              action="{{$form->route_save}}"
              @if($enctype == true) enctype=multipart/form-data @endif>
            @method($method)
            @csrf
            <div class="flex flex-wrap justify-start items-end space-x-3 space-y-5 w-11/12">
                <div class="w-full"></div>
                {{$slot}}
            </div>

            <div class=" p-2 self-start flex flex-row justify-start space-x-5">
                <div>
                    <x-helper.button.main_button type="submit"
                                                 id="real_submit"
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
<script>
    $('#form').submit(function (e) {
        e.preventDefault();
    });
    $("#real_submit").on("click", function () {
        $("#form")[0].submit();
    });
</script>

{{-- probably some code which will send data must be written--}}
