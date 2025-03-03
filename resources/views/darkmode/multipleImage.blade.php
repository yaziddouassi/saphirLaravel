<div class="w-full"
            x-data="{ isUploading: false, progress: 0 }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

           

            <div class="mb-[5px]">
                <span class="text-[white] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
             </div>
        
            <div class="w-[100%]  flex items-center justify-center">
                <label class="w-[100%]">
                    <input type="file" wire:model="saphirMultipleFiles.{{$file}}" accept="image/png,image/jpeg" hidden />
                    <div class="flex w-[100%] h-[50px] px-2 flex-col bg-[#ccc] rounded-full shadow text-[darkblue] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Add Image</div>
                  </label>
            </div>
        
           
            @foreach ($saphirMultipleFiles[$file] as $key => $item)
            <div class="pt-[5px] flex text-white">
                <div class="w-full">
                    @if ($item)  
                        <img src="{{ $item->temporaryUrl() }}" width="100%" class="max-h-[50vh]">    
                     @endif
                </div>
                <div class="">
                    <span class="material-icons text-[red]
                     text-[30px] cursor-pointer"
                     wire:click="saphirDeleteFileByKey('{{$file}}','{{$key}}')">
                        delete_forever
                    </span>
                </div>
           </div>
         @endforeach
        
         @error("saphirMultipleFiles.$file")
         <div class="text-[red] pt-[5px]">
              <span class="error">{{ $message }}</span> 
         </div>
         @enderror     

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress" class="h-[10px] bg-[blue] rounded-[5px]"></progress>
            </div>
        
</div>