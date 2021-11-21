<div x-data="data()" class="p-4 w-40">
    <a @click="toggleEditingState" x-show="!isEditing" x-text="text"
       class="select-none w-40 no-underline cursor-pointer w-full underline text-black">
    </a>
    <input type="$wire.ttt"
           x-text="$wire.ttt"
           x-model="text"
           x-show="isEditing"
           @click.away="toggleEditingState"
           @keydown.enter="disableEditing"
           @keydown.window.escape="disableEditing"
           placeholder="placeholder"
           class="bg-white text-gray-700 focus:outline-none focus:shadow-outline
           border border-gray-300 rounded-lg
           appearance-none leading-normal w-40 overflow-auto" x-ref="input">

</div>
<script>
    function data() {
        return {
            text: "{{$ttt}}",
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
            }
        };
    }
</script>
