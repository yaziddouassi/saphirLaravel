<div class="pb-[15px] pt-[15px]
 bg-[#DDD]   flex
 items-center justify-center">


 <div>
    <div class="flex justify-center text-[green]">
      <span class="block pr-[3px]">
         {{$title}} 
      </span>
      </span>
        <span class="material-icons block text-[blue]">
           {{$icon}}
         </span>
     </div>

     <div class="text-center font-bold text-[24px]">
     {{$value}}
      </div>

     

     <div class="text-center mt-[5px]">
       <button class="bg-[darkblue] text-white w-[140px] p-[10px]"
       wire:click="updateValue()" >
           Update  </button>
      </div>
   </div>

</div>