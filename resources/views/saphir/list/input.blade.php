<div>
    <input type="text" wire:model="{{$name}}" @keyup.debounce.3500ms="changeinput('{{$name2}}')" @focus="supptabs()" >  
</div>

