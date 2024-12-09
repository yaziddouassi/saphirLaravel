{{--  @inputText('tabchamps.name','Nom','*') --}}
<div>
    <div class="mb-[5px]">
       <span class="text-[darkblue]">{{$nomchamp}}</span><span class="text-[red]">{{$requis}}</span> 
    </div>
    <div>
       <input type="text" wire:model="{{$name}}" class="w-full  bg-[#E8E8E8] h-[50px]
      border-[darkblue] border-[1px] ">
    </div>

    @error($name)
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror

 </div>