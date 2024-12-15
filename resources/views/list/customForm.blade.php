<div class="w-full max-w-[600px] m-auto p-[10px] bg-[#111]">

     <div class="text-[20px] text-white text-center font-bold">
        {{$listingCustomTitles[$index]}} N° {{$activeId}}
     </div>

    @foreach ($listingCustomTypes[$index] as $cle => $value)
    <div>
        @include($listingCustomTypes[$index][$cle],
                 $listingCustomInputs[$index][$cle])
    </div>  
    @endforeach

    <div class="mt-[20px]">
        <button class="p-[10px] bg-[blue] text-white w-[160px]"
        @click="activateCustom('{{$index}}')"
        >
            Valider  
          </button>
    </div>
    
</div>