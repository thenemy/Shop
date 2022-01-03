@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div x-data="setInitWidth()"
         @sidebar-event.window="setWidth($event)"
         class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{$form->title}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            

            <div 	class='flex flex-col  space-y-2 space-y-10'>
                			

            <div 	class='flex flex-row  space-x-2 space-x-10 '>
                			

            <div 	class='flex flex-row  space-x-2 space-x-10 flex-1 bg-white items-center shadow-lg rounded p-10'>
                			

            <div >
                			
<x-helper.image.image 	class='w-32 h-32'>{{$entity->avatar->avatar->storage() ?? ""}}</x-helper.image.image>
            </div>			

            <div >
                			
<x-helper.text.text_key key='Имя клиента' value='{{$entity->userCreditData->crucialData->name ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Телефон' value='{{$entity->phone ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Дополнительный номер' value='{{$entity->userCreditData->additional_phone ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Пол' value='{{$entity->userCreditData->sex_show ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Дата рождения' value='{{$entity->userCreditData->crucialData->date_of_birth ?? ""}}'></x-helper.text.text_key>
            </div>
            </div>			

            <div 	class='items-center bg-white shadow-lg rounded p-10'>
                			
<x-helper.text.text_key key='Серия паспорта' value='{{$entity->userCreditData->crucialData->series ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='ПНФЛ' value='{{$entity->userCreditData->crucialData->pnfl ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key_link key='Паспорт' value='Скачать' :link='route("download.file", ["path"=> $entity->userCreditData->crucialData->passport->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Прописка' value='Скачать' :link='route("download.file", ["path"=> $entity->userCreditData->crucialData->passport_reverse->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Паспорт c пользователем' value='Скачать' :link='route("download.file", ["path"=> $entity->userCreditData->crucialData->user_passport->path])'></x-helper.text.text_key_link>
            </div>
            </div>			
<x-helper.container.container title='Рассрочки' class='flex flex-wrap justify-between'>
                			
<livewire:admin.pages.user-show.taken-credit-filtered
            :filterBy="['user_id' => $entity->user_id,]" />
                </x-helper.container.container>
            </div>
        </div>

        <div>
            <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                {{__("Назад")}}
            </x-helper.button.gray_button>
        </div>
    </div>

@endsection

