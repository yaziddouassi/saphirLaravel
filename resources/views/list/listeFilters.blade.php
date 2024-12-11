<div class="p-[10px] pb-[0px]">

   
        <div class="grid grid-cols-2">
           <div class="flex">

              <div class="h-[43px] w-[80px]" @click.away="$wire.actionsDiv1=false">
                 <div>
                  <button class="bg-[black] text-white w-[80px] p-[9px] rounded-[3px]"
                  @click="$wire.actionsDiv1=!$wire.actionsDiv1">
                    Actions
                  </button>
                 </div>
                 <template x-if="$wire.groupId.length != 0">
                 @include('saphir::list.listeActions')
                </template>
              </div>

              
              <template x-if="$wire.groupId.length != 0">
              <div class="pl-[5px]">
                <button @click="rezetabs()"
                 class="bg-[red] text-white  p-[9px] rounded-[3px]">
                  Reset Selected
                </button>
                <span x-text="$wire.groupId.length" class="text-[darkblue]">
                 
                </span>
                <span class="text-[darkblue]">
                   Selected
                </span>
              </div>
            </template>   


           </div>
           <div class="text-right">
            @include('saphir::list.filterPaginationPerPage')
              <button class="border-black border-[1px] p-[9px] rounded-[3px]"
              @click="rezetabs()"
               onclick="confirm('do you want reset all filters ?')
               || event.stopImmediatePropagation()"
              wire:click="resetAll()">
               Reset Filters
             </button>
               <button class="bg-[green] w-[80px] text-white p-[9px] rounded-[3px]"
               @click="$wire.filtersDiv1=!$wire.filtersDiv1">
                Filters
               </button>
           </div>
        </div>
    
        <div class="mt-[10px] bg-black text-white  rounded-[3px] flex" 
        x-show="$wire.filtersDiv1">
            <div class=" min-w-[200px] max-w-[200px] border-r-[1px] border-white
             flex justify-center items-center text-[30px] p-[10px]">
             Filters
            </div>
            <div class="w-full  grid grid-cols-[1fr_600px]">
               <div>
                
               </div>
               <div class="gap-[10px] p-[10px] justify-end " 
               style="display: flex; flex-wrap:wrap;" >

               
               <div class="bg-[black] w-[284px] text-white"> 
                @include('saphir::list.filterPaginationField')
               </div> 
               <div class="bg-[black] w-[284px] text-white"> 
                @include('saphir::list.filterPaginationOrder')
               </div> 
                @foreach ($tableFilters as $key => $item)
                <div class="bg-[black] w-[284px] text-white">  
                  @if ($listingFilterTypes[$key] == 'text')
                      @include('saphir::list.filterText')
                  @endif
                  @if ($listingFilterTypes[$key] == 'date')
                      @include('saphir::list.filterDate')
                  @endif
                  @if ($listingFilterTypes[$key] == 'checkbox')
                      @include('saphir::list.filterCheckbox')
                  @endif
                  @if ($listingFilterTypes[$key] == 'select')
                      @include('saphir::list.filterSelect')
                  @endif

               </div>
                @endforeach

                  
                 
               </div>
            </div>
        </div>
    
    </div>