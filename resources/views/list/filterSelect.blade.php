<div class="w-full">

    <div class="pb-[4px] font-bold">
      {{$listingFilterLabels[$key]}}
      </div>


      <div class="flex w-full  h-[50px] rounded-[25px] text-black">
        <div class="w-full pt-[4px] bg-[#E8E8E8] rounded-[3px]">
             <select class="w-full bg-[#E8E8E8] h-[42px]  border-[0px]
           border-transparent focus:border-transparent focus:ring-0"
           wire:model="tableFilters.{{$key}}"
           @change="$wire.changeFilterField('{{$key}}')"
           @focus="rezetabs()"
           >
                <option value="">All</option>
                @foreach ($listingFilterTabs[$key] as $cle => $item)
                   <option value="{{$item}}">{{$listingFilterTabLabels[$key][$cle]}}
                    </option> 
                @endforeach
             </select>
        </div>
        <div  class="pl-[4px] pt-[12px]">
        <svg @click="rezetabs()" 
         wire:click="resetFilterField('{{$key}}')"
           width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="12" cy="12" r="11" stroke="white" stroke-width="1"/>
            <line x1="7" y1="7" x2="17" y2="17" stroke="white" stroke-width="1"/>
            <line x1="7" y1="17" x2="17" y2="7" stroke="white" stroke-width="1"/>
          </svg>
        </div>
    </div>


    

 </div>