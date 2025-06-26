<div class="w-full "
    x-data="{ isUploading: false, progress: 0 , showFile : true}"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <div class="mb-[5px]">
        <span class="text-[white] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
     </div>

    <div class="w-[100%]  flex items-center justify-center" x-show="$wire.saphirFile0pens.{{$file}}">
        <label class="w-[100%]">
            <input type="file" wire:model="saphirFiles.{{$file}}"  hidden />
            <div class="flex w-[100%] h-[50px] px-2 flex-col bg-[blue] rounded-full shadow text-[white] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Choose File</div>
          </label>
    </div>

    <!-- Progress Bar -->
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress" class="h-[10px] bg-[blue] rounded-[5px]"></progress>
    </div>


    <div class="pb-[20px] pt-[0px] " 
       x-show="!$wire.saphirFile0pens.{{$file}}">
        <div class="text-center bg-[#CFCFCF] h-[50px]  text-[32px]
         font-[arial] pr-[5px] border-[BLACK] border-[1px]"
        @click="$wire.saphirFile0pens.{{$file}}=true">
            Close
         </div>
         <div class="bg-[#DDD] text-black border-[2px] border-white mt-[10px]
          p-[10px] pb-[20px] pt-[20px] rounded-[5px]">
            @if ($saphirRecord != null)
            {{ $saphirRecord[$file] }}   
            @endif
           
         </div>
    </div>
    
    <div>
        @if ($saphirFiles[$file])
         <div class="bg-[#DDD] text-black border-[2px] border-white mt-[10px]
          p-[10px] pb-[20px] pt-[20px] rounded-[5px]">
            {{ $saphirFiles[$file]->getClientOriginalName() }}
         </div>
        @endif
    </div>


    @error("saphirFiles.$file")
    <div class="text-[red] pt-[5px]">
         <span class="error">{{ $message }}</span> 
    </div>
    @enderror
  
    
</div>
