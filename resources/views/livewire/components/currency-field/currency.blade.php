<div x-data="data()" class="p-4 w-40 currency-field">

    <label for="input_currency">
        <a @click="toggleEditingState" x-show="!isEditing" x-text="text"
           class="select-none  w-40 no-underline cursor-pointer w-full underline text-black">
        </a>
    </label><input
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
        class="bg-white currency-field text-gray-700 focus:outline-none focus:shadow-outline
           border border-gray-300 rounded-lg
           appearance-none leading-normal w-40 overflow-auto" x-ref="input"
        style="display: block !important;"
    >

</div>
<script>
    let textInput = '{{$ttt}}'
    function data() {
        return {
            text: textInput,
            isEditing: false,
            toggleEditingState() {

                this.isEditing = !this.isEditing;

                if (this.isEditing ) {
                    this.$nextTick(() => {
                        this.$refs.input.focus();
                    });
                }
            },
            disableEditing() {
                this.isEditing = false;
            }
        };

    }

    $('input[name="userInput[]"]').each(function () {
        if (this.value === '') {
            this.focus();
            console.log('123')
        }
    });

</script>
