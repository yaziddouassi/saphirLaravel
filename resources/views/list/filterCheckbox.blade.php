<div class="w-full">

    <div class="pb-[4px] font-bold">
      {{$listingFilterLabels[$key]}}
    </div>
  
    <div class="flex w-full">
       <input type="checkbox"
       wire:model="tableFilters.{{$key}}"
       @change="$wire.changeFilterFieldCheckbox('{{$key}}',$event.target.checked)"
       @focus="rezetabs()"
       class="bg-[#E8E8E8]">
    </div>
  
  </div>