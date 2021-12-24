<input id="in"
       type="{{$type}}"
       @if($type=='number')
       onkeydown="onlyNumbers(event)"
       @endif
       name="{{$name}}"
       oninput="{{$filter}}"
       class="input-custom"
       @if($defer)
       wire:model.defer="{{$attributes['wire:model']}}"
       @else
       wire:model="{{$attributes['wire:model']}}"
       @endif
       wire:key="{{$attributes['wire:key'] ?? ""}}"
/>
<script>


</script>
