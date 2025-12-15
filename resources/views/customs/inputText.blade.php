<div>
   <div class="w-full mb-[5px]">
      <span class="text-black font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
   </div>
   <div>
      <input type="text" wire:model="saphirFields.{{$field}}" class="w-full  bg-white h-[50px]
     border-[darkblue] border-[1px] ">
   </div>

   @error("saphirFields.$field")
   <div class="text-[red] pt-[5px]">
        <span class="error">{{ $message }}</span> 
   </div>
   @enderror

</div>
