<div class="w-full"
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
                    <input type="file" wire:model="saphirFiles.{{$file}}" accept="video/*" hidden />
                    <div class="flex w-[100%] h-[50px] px-2 flex-col bg-[blue] rounded-full shadow text-[white] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Choose Video</div>
                  </label>
            </div>
        
               <!-- Progress Bar -->
               <div x-show="isUploading">
                <progress max="100" x-bind:value="progress" class="h-[10px] bg-[blue] rounded-[5px]"></progress>
              </div>
           
            <div class="mt-[-8px]" x-show="!$wire.saphirFile0pens.{{$file}}">
                <div class="text-right relative text-[red] text-[32px] font-[arial] pr-[5px] z-[100]">
                   <span @click="$wire.saphirFile0pens.{{$file}}=true" class="cursor-pointer">C</span><span @click="$wire.saphirFile0pens.{{$file}}=true" class="text-[#CCC] cursor-pointer">lo</span ><span @click="$wire.saphirFile0pens.{{$file}}=true" class="cursor-pointer">se</span>
                </div>
                <div class="mt-[-44px]">
                  @if ($saphirRecord != null)
                    <video width="100%" class="max-h-[50vh]" controls="controls">
                       <source src="{{$saphirUrlStorage}}{{ $saphirRecord[$file]}}" type="video/mp4" />
                    </video> 
                  @endif
                </div>  
              </div>

              <div class="pt-[5px]" x-show="$wire.saphirFile0pens.{{$file}}">
                @if ($saphirFiles[$file]) 
                  <video width="100%" class="max-h-[50vh]" src="{{ $saphirFiles[$file]->temporaryUrl() }}" controls>
                  </video>  
                @endif
              </div>
          
            @error("saphirFiles.$file")
              <div class="text-[red] pt-[5px]">
                <span class="error">{{ $message }}</span> 
              </div>
             @enderror

         
</div>
