<div>
  <a href="{{$listingRoute}}/edit/{{$item->id}}" wire:navigate>
    <button
         class="bg-[{{$bg}}] min-w-[40px] text-[{{$color}}] 
          p-[6px] h-[43px]   rounded-[3px]">
         
          <div class="flex justify-center">
            <span class="material-icons text-[20px] pt-[2px]"
            style="display: block;">
            {{$icon}}
              </span>
              
            <span class=""
            style="display: block;font-size:16px;">
            {{$text}}
              </span>
             
            </div>
     </button> 
    </a>
</div>