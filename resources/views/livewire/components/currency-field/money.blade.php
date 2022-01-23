<div>
    <div x-data="dataMoney()" class="p-4 w-full currency-field">
        <div class="flex flex-col items-start">

            <input
                id="money"
                type="text"
                wire:model="money.hold"
                @click="enableEditing"
                oninput="onlyNumbers(event)"
                @click.away="disableEditing"
                x-bind:class="isEditing? 'border border-gray-300 rounded' : 'cursor-pointer'"
                class="focus:outline-none
                focus:ring focus:border-gray-500
                w-full
                focus:border-green-50"
                placeholder="{{__('Введите удержку')}}">
        </div>
    </div>
</div>
