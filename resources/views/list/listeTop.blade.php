<div class="flex justify-between pt-[5px] pr-[5px] pl-[5px]">
          
    <div class="flex w-[230px] bg-[#E8E8E8] h-[50px] rounded-[25px] pl-[12px]">
      <div class="w-full pt-[4px] rounded-[25px]">
           <input  placeholder="Search ..." wire:model="search"
           wire:keyup.debounce.1000ms="SearchChange()"
           @focus="rezetabs()" 
           class="w-full bg-[#E8E8E8] h-[42px] border-[0px]
           border-transparent focus:border-transparent focus:ring-0">
      </div>
      <div  class="pr-[6px] pt-[12px]">
        <svg @click="rezetabs()" wire:click="SearchReset()"
         width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="12" cy="12" r="11" stroke="black" stroke-width="1"/>
          <line x1="7" y1="7" x2="17" y2="17" stroke="black" stroke-width="1"/>
          <line x1="7" y1="17" x2="17" y2="7" stroke="black" stroke-width="1"/>
        </svg>
      </div>
  </div>

  <div>
    <button class="bg-[black] pr-[16px] pl-[16px] p-[8px] text-white">
      {{$saphirModelLabel}}</button>
      <a href="{{$listingRoute}}/create" wire:navigate>
    <button class="bg-[blue] pr-[16px] pl-[16px] p-[8px] text-white">
      New
      </button> 
    </a>  
  </div>
</div>