<input id="in" type="{{$type}}" name="{{$name}}"
       class="input-custom"
       wire:model.defer="{{$attributes['wire:model']}}"
       wire:key="{{$attributes['wire:key'] ?? ""}}"
/>
