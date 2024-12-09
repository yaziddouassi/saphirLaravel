<select class="w-[90px] bg-[#E8E8E8] h-[44px]  border-[1px]
    border-black 
    rounded-[2px]"
    wire:model="paginationPerPage"
           @change="$wire.PaginationPerPageValue()"
           @focus="rezetabs()"
           >
               
                @foreach ($paginationPerPageList as $cle => $item)
                   <option value="{{$item}}"> {{$item}}
                    </option> 
                @endforeach
             </select>
     


    

 