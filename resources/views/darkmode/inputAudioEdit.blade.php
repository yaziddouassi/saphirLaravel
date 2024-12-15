<div class="w-full"
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

            <div x-show="!$wire.saphirFile0pens.{{$file}}">
              <div class="bg-black h-[50px] text-center text-[#ccc] text-[20px] font-[arial] pt-[10px] pr-[5px] z-[100]">
                <span @click="$wire.saphirFile0pens.{{$file}}=true" class="cursor-pointer">Close Audio</span>
              </div>
              <div class="pt-[8px]">
                @if ($saphirRecord != null)
                  <figure>
                      <figcaption class="text-[white] p-[8px] pb-[16px] pt-[16px]
                      bg-[darkblue] rounded-[3px]">{{ $saphirRecord[$file] }}</figcaption>
                      <audio controls class="pt-[8px] w-full"
                      src="{{$saphirUrlStorage}}{{ $saphirRecord[$file]}}">
                      </audio>
                     </figure>
                @endif
              </div>  
            </div>

            @if ($saphirFiles[$file])
            <div class="pt-[7px]" x-show="$wire.saphirFile0pens.{{$file}}">
              <figure>
                <figcaption class="text-[white] p-[8px] pt-[17px] pb-[17px] bg-[black] rounded-[3px]">{{ $saphirFiles[$file]->getClientOriginalName() }}</figcaption>
                <audio controls class="pt-[8px]" src="{{ $saphirFiles[$file]->temporaryUrl() }}" >
                </audio>
               </figure>
            </div>
            @endif

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