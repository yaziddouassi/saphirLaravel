{{--  @inputVidep($tabfiles['file1'],'tabfiles.file1','Video1','*') --}}
<div class="max-w-[300px]"
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

           

            <div class="mb-[5px]">
                <span class="text-[darkblue]">{{$label}}</span><span class="text-[red]">{{$required}}</span> 
             </div>
        
            <div class="w-[100%]  flex items-center justify-center">
                <label class="w-[100%]">
                    <input type="file" wire:model="tabfiles.{{$file}}" accept="video/*" hidden />
                    <div class="flex w-[100%] h-12 px-2 flex-col bg-[#ccc] rounded-full shadow text-[darkblue] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Choose File</div>
                  </label>
            </div>
        
            <div class="pt-[5px]">
              @if ($tabfiles[$file]) 
                <video width="100%" class="max-h-[50vh]" controls="controls">
                   <source src="{{ $tabfiles[$file]->temporaryUrl() }}" type="video/mp4" />
                </video>  
              @endif
            </div>
          
            @error("tabfiles.$file")
              <div class="text-[red] pt-[5px]">
                <span class="error">{{ $message }}</span> 
              </div>
             @enderror

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress" class="h-[10px] bg-[blue] rounded-[5px]"></progress>
            </div>
        
</div>