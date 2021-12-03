<template>
    <x-helper.input.input></x-helper.input.input>
</template>
<div class="items-center w-full flex flex-wrap mb-4">
    <button onclick="createField()" class=" group flex first-button flex-row w-8 justify-center items-center mt-2">
        <img v-for="item in items" class="transform first:rotate-45 w-full w-6" src="{{asset('images/plus_icon.svg')}}"
             alt="">
    </button>
   <x-helper.form_field.container.template/>
</div>

<script type='text/javascript'>

    function createField(e) {
        const myTemplate = document.getElementById('myTemplate');
        const normalContent = document.getElementById('normalContent');
        const clonedTemplate = myTemplate.content.cloneNode(true);
        normalContent.appendChild(clonedTemplate);
        $('.first-button').remove()
    }

    function createButton(e) {
        console.log(e);
        const myTemplate = document.getElementById('myTemplate');
        const normalContent = document.getElementById('normalContent');
        const clonedTemplate = myTemplate.content.cloneNode(true);
        normalContent.appendChild(clonedTemplate)
        $('#buttons').remove()
    }

    function deleteLast() {
        $('.fieldOfInput').last().remove()
    }
</script>
