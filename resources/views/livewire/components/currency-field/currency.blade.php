<div x-data="data()" class="p-4 w-40 currency-field">


    <p aria-placeholder="some" @click="toggleEditingState" x-show="!isEditing" x-text="text"
       class="select-none line-through w-40 break-words no-underline cursor-pointer w-full underline text-black">
    </p>

    <input
        onclick="return isEmpty()"
        name="userInput"
        type="text"
        x-text="$wire.ttt"
        x-model="text"
        x-show="isEditing"
        @click.away="toggleEditingState"
        @keydown.enter="disableEditing"
        @keydown.window.escape="disableEditing"
        id="input_currency"
        placeholder="placeholder"
        value="Add Value"
        class="bg-white break-words currency-field text-gray-700 focus:outline-none focus:shadow-outline
               border border-gray-300 rounded-lg
               appearance-none leading-normal w-40 overflow-auto" x-ref="input"
        style="display: block !important;"
    >
</div>
<script>
    let textInput = '{{$ttt}}'
    let defaultValue = 'value is empty'

    function data() {
        return {
            text: textInput,
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
                this.isEditing = true;
            }
        };
    }

    const isEmpty = str => !str.trim().length;


    document.getElementById("input_currency").addEventListener("input", function() {
        if( isEmpty(this.value) ) {
            return $('#input_currency').change
        } else {
            return this.value = textInput
        }
    });
</script>
