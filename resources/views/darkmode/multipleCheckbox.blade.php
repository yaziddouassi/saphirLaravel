<div x-data="{content : $wire.entangle('saphirMultiples.{{$field}}'),

init() {

if(this.content == null) {
       this.content = [] ;
       }

$watch('content', value => {
       if(this.content == null) {
       this.content = [] ;
       }

       console.log(this.content)
    });
console.log(this.content)



}



}">
    <div class="w-full mb-[5px]">
       <span class="text-[white] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
    </div>
    
    @foreach ($collection as $key => $item)
    <div>
    <label>
        <input type="checkbox" wire:model="saphirMultiples.{{$field}}" value="{{$item}}">
        <span class="text-white">{{$labels[$key]}}</span>
    </label>
    </div>
    @endforeach

 
    @error("saphirMultiples.$field")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror
 
 </div>