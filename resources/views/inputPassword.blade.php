<div x-data="{ showPassword: false }" class="w-full">
    <div class="mb-[5px]">
       <span class="text-[darkblue] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
    </div>
    

    <div class="flex w-full bg-[#E8E8E8] h-[50px]">
        <div class="w-full pt-[4px]">
             <input :type="showPassword ? 'text' : 'password'"  
             class="w-full bg-[#E8E8E8] h-[42px] border-[0px]
             border-transparent focus:border-transparent focus:ring-0" 
             wire:model="saphirFields.{{$field}}">
        </div>
        <div @click="showPassword = !showPassword" class="p-[6px] pt-[12px]">
            <i class="fa fa-eye text-[24px] text-[darkblue]"></i>
        </div>
    </div>

    @error("saphirFields.$field")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror

 </div>