<div class="w-full">
    <div class="mb-[5px]">
       <span class="text-[darkblue] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
    </div>
    <div>
       <input type="date" wire:model="saphirFields.{{$field}}" class="w-full  bg-[#E8E8E8] h-[50px]
      border-[darkblue] border-[1px]"

      @if($min != false)
        min="{{$min}}"
      @endif
      @if($max != false)
        max="{{$max}}"
      @endif
      >
    </div>

    @error("saphirFields.$field")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror

 </div>