<div>
    <input type="checkbox" class="form-control" wire:model="checkBox"
           value="1">
    <input type="checkbox" class="form-control" wire:model="checkBox"
           value="2">
    <input type="checkbox" class="form-control" wire:model="checkBox"
           value="3">
    {{implode(", ", $checks)}}
    <button wire:click="callFunc" class="bg-blue-500 p-20">asdsadsa</button>
</div>

