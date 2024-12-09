<div class="flex w-full justify-between p-[5px]">
            <div> 
              <a href="{{$saphirRouteListe}}/create" wire:navigate>
                <button class="bg-[darkblue] w-[100px] text-white p-[9px] rounded-[2px]">
                New
               </button>
              </a>
            </div>
            <div>
              <a href="{{$saphirRouteListe}}" wire:navigate>
            <button class="bg-[black]  text-white p-[9px] rounded-[2px]">
              {{$saphirModelLabel}}
              </button>
            </a>
            </div>
        </div>

        <div class="p-[10px] text-[24px] font-bold">
         {{$saphirModelTitle}}  >>
        </div>