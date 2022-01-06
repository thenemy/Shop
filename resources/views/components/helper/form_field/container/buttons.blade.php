<div id="buttons" class="items-center justify-center w-auto flex flex-row">
    <button type="button" onclick="createButton()"
            class="transform motion-safe:hover:scale-110 m-1 flex flex-row w-8 justify-center items-center mt-2">
        <img class="transform motion-safe:hover:scale-110 w-full w-6"
             src="{{asset('images/plus_icon.svg')}}"
             alt="">
    </button>
    <button type="button" onclick="deleteLast()"
            class="transform motion-safe:hover:scale-110 w-8 m-1 delete justify-center items-center mt-2">
        <img class="w-full delete w-6"
             src="{{asset('images/minus_icon.svg')}}"
             alt="">
    </button>
</div>
