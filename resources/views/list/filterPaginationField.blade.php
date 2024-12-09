<div class="w-full">

    <div class="pb-[4px] font-bold">
       ORDER BY FIELD 
      </div>


      <div class="h-[50px]  text-black">
        <div class="w-full  bg-[#E8E8E8] rounded-[3px]">
             <select class="w-full bg-[#E8E8E8] h-[50px]  border-[0px]
           border-transparent focus:border-transparent focus:ring-0
           rounded-[2px]"
           wire:model="paginationField"
           @change="$wire.PaginationFieldValue()"
           @focus="rezetabs()"
           >
                @foreach ($paginationFieldList as $cle => $item)
                   <option value="{{$item}}"> {{$item}}
                    </option> 
                @endforeach
             </select>
        </div>
    </div>


    

 </div>