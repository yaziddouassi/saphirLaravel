<div x-show="$wire.listingCustomOpens.{{$index}}" 
 class="fixed z-[101] top-0 bottom-0 right-0 left-0 overflow-y-scroll 
    min-h-[100vh] bg-[#000]">
    <div class="flex p-[5px] justify-end">
        <div>
           <svg @click="$wire.listingCustomOpens.{{$index}}=false"
              width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
             <circle cx="20" cy="20" r="19" stroke="white" stroke-width="2" fill="none" />
              <line x1="12" y1="12" x2="28" y2="28" stroke="white" stroke-width="2" />
             <line x1="28" y1="12" x2="12" y2="28" stroke="white" stroke-width="2" />
            </svg>
        </div>
      </div>

    <div class="flex  items-center justify-center
    p-[10px] pt-[30px] min-h-[70vh]">
      <div class="w-full">
      {{ $slot }}
      </div>
    </div>
    

    
</div>