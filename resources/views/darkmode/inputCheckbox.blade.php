<div x-data="{content : $wire.entangle('saphirFields.{{$field}}'),

init() {
console.log('hello');

if($wire.saphirFields.{{$field}} == null) {
        this.content = false
        }

$watch('content', value => {
        if($wire.saphirFields.{{$field}} == null) {
        this.content = false
        }
    });

}

}">
    <div class="w-full mb-[5px]">
       <span class="text-[white]">{{$label}}</span>
    </div>
    <div>
       <input type="checkbox" wire:model="saphirFields.{{$field}}" class="bg-[#E8E8E8]">
    </div>
 </div>