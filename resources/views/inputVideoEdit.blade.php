<div class="w-full"
            x-data="{ 
                isUploading: false, 
                progress: 0, 
                videoPreviewUrl: null,
                hasNewUpload: false,
                cle : '{{$file}}',
                oldVideoUrl: '',

                init() {
                  console.log($wire.saphirRecordBis)
                  this.updateOldVideoUrl();
                  
                  // Écouter les changements de Livewire
                  this.$watch('$wire.saphirRecordBis', () => {
                      this.updateOldVideoUrl();
                  });
                  
                  this.$watch('$wire.saphirUrlStorage', () => {
                      this.updateOldVideoUrl();
                  });
                },
                
                updateOldVideoUrl() {
                    if ($wire.saphirRecordBis && $wire.saphirRecordBis[this.cle]) {
                        this.oldVideoUrl = $wire.saphirUrlStorage + $wire.saphirRecordBis[this.cle];
                        console.log('URL mise à jour:', this.oldVideoUrl);
                    }
                }
            }"
            x-on:livewire-upload-start="isUploading = true"
            x-on:livewire-upload-finish="isUploading = false; $wire.saphirHasNewUpload[cle] = true"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
          
            <div class="mb-[5px]">
                <span class="text-[darkblue] font-bold">{{$label}}</span><span class="text-[red]">@if($required==true)*@endif</span> 
            </div>
        
            <!-- Bouton d'upload -->
            <div class="w-[100%] flex items-center justify-center">
                <label class="w-[100%]">
                    <input type="file" 
                           wire:model="saphirFiles.{{$file}}" 
                           accept="video/*" 
                           hidden 
                           x-ref="videoInput"
                           @change="if ($refs.videoInput.files.length) {
                               $wire.saphirPreviewUrl[cle] = URL.createObjectURL($refs.videoInput.files[0]);
                               $wire.saphirHasNewUpload[cle] = true;
                           }"
                    />
                    <div class="flex w-[100%] h-[50px] px-2 flex-col border-[1px] border-black rounded-full 
                    shadow text-black text-[14px] font-semibold leading-4 items-center justify-center
                    cursor-pointer focus:outline-none">
                        Choisir une vidéo
                    </div>
                </label>
            </div>
        
            @if ($saphirFiles[$file])
            <!-- Aperçu de la nouvelle vidéo avec bouton effacer -->
            <template x-if="$wire.saphirPreviewUrl[cle] && $wire.saphirHasNewUpload[cle]">
                <div class="mt-4 w-full">
                    <video class="mt-2 w-full max-w-[500px] max-h-[50vh] rounded shadow border" controls :src="$wire.saphirPreviewUrl[cle]"></video>
                </div>
            </template>
            @endif


            <!-- Progress Bar -->
            <div x-show="isUploading" class="mt-2">
                <progress max="100" x-bind:value="progress" class="w-full h-[10px] bg-[blue] rounded-[5px]"></progress>
            </div>

            <!-- Affichage de l'ancienne vidéo (seulement si pas de nouveau upload) -->
            @if ($saphirRecord != null && isset($saphirRecord[$file]))
            <template x-if="!$wire.saphirPreviewUrl[cle] && !$wire.saphirHasNewUpload[cle] && oldVideoUrl">
                <div class="mt-[5px]">
                    <video class="w-full max-h-[50vh]" controls x-bind:src="oldVideoUrl">
                        <source x-bind:src="oldVideoUrl" type="video/mp4" />
                    </video>
                </div>
            </template>
            @endif

            <!-- Nom du fichier uploadé -->
            <div class="pt-[5px]" x-show="$wire.saphirPreviewUrl[cle]">
                @if ($saphirFiles[$file])
                    <div class="bg-[#DDD] text-black border-[2px] border-white mt-[10px] p-[10px] pb-[20px] pt-[20px] rounded-[5px]">
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
