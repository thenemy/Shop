<form class="delete-form" action="{{$slot}}" method="POST" x-data="{'show' : false}">
    @csrf
    @method("DELETE")
    <button type="button" @click="show = !show">
        <img class="w-5 h-5 transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110"
             src="{{asset('images/trash.svg')}}"
             alt="">
    </button>
    <x-helper.modal.modal_delete class="delete-icon"
                                 type="button"
                                />
</form>
