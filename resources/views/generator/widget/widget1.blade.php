<div class="pb-[15px] pt-[15px]
 bg-[#DDD]   flex
 items-center justify-center">


 <div>
    <div class="text-center text-[green]">
       {{$title}} 
       <span><i class="{{$icon}}" ></i></span>
       
     </div>

     <div class="text-center font-bold text-[24px]">
     {{$value}}
      </div>

     

     <div class="text-center mt-[5px]">
       <button  class="bg-[blue] text-white w-[140px] p-[10px]"
       wire:click="updateValue()" >
           Update  </button>
      </div>
   </div>

</div>