<div x-data="{content : $wire.entangle('saphirFields.{{$field}}'),

init() {
 this.changerValeur() ;

$watch('content', value => {
       this.changerValeur() ;
    });

},

changerValeur() {

var nameField = document.getElementById('saphir-checkbox-{{$field}}');
if($wire.saphirFields.{{$field}} == null) {
        this.content = 0 ;
        }

if($wire.saphirFields.{{$field}} == false) {
        this.content = 0 ;
        }

if($wire.saphirFields.{{$field}} == true) {
        this.content = 1 ;
        }
if($wire.saphirFields.{{$field}} == 0) {
        nameField.checked = false; 
        }
if($wire.saphirFields.{{$field}} == 1) {
        nameField.checked = true; 
        }

}

}">
    <div class="w-full mb-[5px]">
       <span class="text-[darkblue] font-bold">{{$label}}</span>
    </div>
    <div>
       <input type="checkbox" wire:model="saphirFields.{{$field}}" 
       id="saphir-checkbox-{{$field}}"  class="bg-[#E8E8E8]">
    </div>
 </div>