<form class="delete-form" action="{{$slot}}" method="POST" x-data="{'show' : false}">
    @csrf
    @method("DELETE")
    <button class="icon_action" type="button" @click="show = !show">
        <span class="fas fa-trash text-red-500"></span>
    </button>
    <x-helper.modal.modal_delete class="delete-icon"
                                 type="button"
                                />
</form>
