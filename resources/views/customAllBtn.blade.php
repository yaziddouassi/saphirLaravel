
    @foreach ($listingCustoms as $key => $value)
         <div>
            <button @click="openCustom('{{$item->id}}','{{$key}}')"
              class="bg-[{{$listingCustombackgrounds[$key]}}] min-w-[40px] 
              text-[{{$listingCustomColorIcons[$key]}}] 
             p-[8px] rounded-[3px] h-[44px]">
             <div class="flex">
               <div class="pt-[2px]">
             <span class="material-icons text-[20px]">
               {{$listingCustomIcons[$key]}}
               </span>
               </div>
               <div class="pl-[3px]">
             <span class="text-[{{$listingCustomColorTexts[$key]}}]" >
                {{$listingCustomLabels[$key]}}</span>
              </div>
            </div>
            </button> 

         </div>
    @endforeach
   
    
    
   
    
    
    