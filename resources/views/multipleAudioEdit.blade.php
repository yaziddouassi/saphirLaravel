  <div class="w-full"
            x-data="{ isUploading: false, progress: 0 , lastAudioUrl: null}"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress">

           

            <div class="mb-[5px]">
                <span class="text-[darkblue] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
             </div>
        
            <div class="w-[100%]  flex items-center justify-center">
                <label class="w-[100%]">
                    <input type="file" wire:model="saphirMultipleFiles.{{$file}}" accept="audio/*"
                     hidden 
                     x-ref="fileInput"
                     @change="if ($refs.fileInput.files.length) {
                        lastAudioUrl = URL.createObjectURL($refs.fileInput.files[$refs.fileInput.files.length - 1]);
                      }"
                    @foo.window="lastAudioUrl=null"
                     />
                    <div class="flex w-[100%] h-[50px] px-2 flex-col bg-[blue] rounded-full shadow text-[white] text-[14px] font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none">Add Audio</div>
                  </label>
            </div>
        
            <!-- ✅ Aperçu audio du dernier fichier sélectionné -->
           <template x-if="lastAudioUrl">
               <div class="mt-4 w-full">
                <span class="text-green-600 font-semibold">Dernier audio ajouté :</span>
                <audio class="mt-2 w-full" controls :src="lastAudioUrl"></audio>
                </div>
           </template>
           
            @foreach ($saphirMultipleFiles[$file] as $key => $item)
            <div class="flex bg-[#DDD] text-black border-[2px] border-white mt-[10px]
          p-[10px] pb-[20px] pt-[20px] rounded-[5px]">
                <div class="w-full">
                    @if ($item) 
                    {{ $item->getClientOriginalName() }}
                     @endif
                </div>
                <div>
                    <span class="material-icons text-[red]
                     text-[30px] cursor-pointer"
                     wire:click="saphirDeleteFileByKey('{{$file}}','{{$key}}')">
                        delete_forever
                    </span>
                </div>
           </div>
         @endforeach

         @if ($saphirMultipleFileRecords != [])
         @foreach ($saphirMultipleFileRecords[$file] as $key => $item)
         <div class="pt-[5px] flex">
             <div class="w-full">
                 @if ($item) 
                 <audio controls class="pt-[8px]  w-full" src="{{$saphirUrlStorage}}{{$item}}">
                 </audio>
                  @endif
             </div>
             <div class="pt-[14px]">
                 <span class="material-icons text-[red]
                  text-[30px] cursor-pointer"
                  wire:click="saphirDeleteFileRecordByKey('{{$file}}','{{$key}}')">
                     delete_forever
                 </span>
             </div>
        </div>
        @endforeach
        @endif
        
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

