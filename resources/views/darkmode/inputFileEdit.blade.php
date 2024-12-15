<div class="w-full "
    x-data="{ isUploading: false, progress: 0 , showFile : true}"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <div class="mb-[5px]">
        <span class="text-[white]">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
     </div>

    <div class="w-[100%]  flex items-center justify-center" x-show="$wire.saphirFile0pens.{{$file}}">
        <label class="w-[100%]">
            <input type="file" wire:model="saphirFiles.{{$file}}"  hidden />
            <div class="flex w-[100%] h-[50px] px-2 flex-col bg-[#ccc] rounded-full shadow text-[darkblue] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Choose File</div>
          </label>
    </div>


    
    
    <div class="mt-[-5px] text-white bg-[#777] p-[10px] pb-[20px] pt-[0px] rounded-[5px]" 
       x-show="!$wire.saphirFile0pens.{{$file}}">
        <div class="text-right relative text-[red] text-[32px] font-[arial] pr-[5px] z-[100]">
            <span @click="$wire.saphirFile0pens.{{$file}}=true" class="cursor-pointer">C</span><span @click="$wire.saphirFile0pens.{{$file}}=true" class="text-[#CCC] cursor-pointer">lo</span ><span @click="$wire.saphirFile0pens.{{$file}}=true" class="cursor-pointer">se</span>
         </div>
         <div>
            @if ($saphirRecord != null)
            {{ $saphirRecord[$file] }}   
            @endif
           
         </div>
    </div>
    
    <div class="pt-[5px] bg-[#777]">
        @if ($saphirFiles[$file])
         <div class="text-white mt-[10px] p-[10px] pb-[20px] pt-[5px] rounded-[5px]">
            {{ $saphirFiles[$file]->getClientOriginalName() }}
         </div>
        @endif
    </div>


    @error("saphirFiles.$file")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror
  
    <!-- Progress Bar -->
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress" class="h-[10px] bg-[blue] rounded-[5px]"></progress>
    </div>

</div>