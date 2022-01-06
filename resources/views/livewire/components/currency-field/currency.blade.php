<div>
    <div x-data="data()" class="p-4 w-full currency-field">

        <div class="flex flex-col items-start">
            <label for="currency" class="block text-gray-700 text-sm font-bold mb-1">
                {{__("Валюта")}}
            </label>
            <input
                id="currency"
                type="text"
                wire:model="currency"
                @click="enableEditing"
                label="Валюта"
                @click.away="disableEditing"
                @keydown.enter=""
                x-bind:class="isEditing? 'border border-gray-300 rounded' : 'cursor-pointer'"
                class="focus:outline-none
                focus:ring focus:border-gray-500
                w-full
                focus:border-green-50"
                placeholder="{{__('Введите Валюту')}}">
        </div>


    </div>
    <script>
        let previous = "";
        $('#currency').on("input", function () {
            let reg = new RegExp('^[0-9]*$')
            if (!reg.test($(this).val())) {
                $(this).val(previous);
            } else {
                previous = $(this).val();
            }
        });

        function data() {
            return {
                // text: textInput,
                isEditing: false,
                toggleEditingState() {

                    this.isEditing = !this.isEditing;

                    if (this.isEditing) {
                        this.$nextTick(() => {
                            this.$refs.input.focus();
                        });
                    }
                },
                disableEditing() {
                    this.isEditing = false;
                },
                enableEditing() {
                    this.isEditing = true;
                }
            };
        }

    </script>
</div>
