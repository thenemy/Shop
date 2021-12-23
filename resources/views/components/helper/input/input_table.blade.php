<input id="in"
       type="{{$type}}"
       @if($type=='number')
       onkeydown="javascript: return  !((event.keyCode >= 105 && event.keyCode <= 109) || event.keyCode === 69)"
       @endif
       name="{{$name}}"
       class="input-custom"
       onchange="$dispatch()"
       @if($defer)
       wire:model.defer="{{$attributes['wire:model']}}"
       @else
       wire:model="{{$attributes['wire:model']}}"
       @endif
       wire:key="{{$attributes['wire:key'] ?? ""}}"
/>
<script>

    function numericOnly(event) { // restrict e,+,-,E characters in  input type number
        const charCode = (event.which) ? event.which : event.keyCode;
        return !(charCode === 101 || charCode === 69 || charCode === 45 || charCode === 43);
    }
</script>
