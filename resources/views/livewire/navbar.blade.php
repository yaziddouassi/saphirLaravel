<div class="min-[800px]:hidden h-[60px]" x-data="{
  showNavbar: false ,
  showNavbar2: false ,
}">

    <div class="fixed w-full top-0 right-0 left-0 bottom-0 z-[50]
    text-[white] min-[800px]:hidden bg-black h-[60px] text-center flex">
        <div class="w-[60px] pt-[15px]" @click="showNavbar=true">
         <span class="material-icons text-[30px]">
            menu
            </span>
        </div>
        <div class="h-[60px] w-full font-bold text-[26px] pt-[10px] ">
            DASHBOARD
         </div>
         <div class="h-[60px] w-[60px] pt-[14px]" @click="showNavbar2=true">
        <span class="material-icons text-[30px]">
         account_circle
         </span>
         </div>

    </div>
     
    <div x-show="showNavbar" class="fixed w-full top-0 right-0 left-0 bottom-0 z-[100] 
    min-h-[100vh]  pb-[40px]
    bg-black text-white overflow-y-scroll">
         <div class="flex p-[5px] justify-end">
            <div>
            <svg @click="showNavbar=false"
               width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
               <circle cx="20" cy="20" r="19" stroke="white" stroke-width="2" fill="none" />
               <line x1="12" y1="12" x2="28" y2="28" stroke="white" stroke-width="2" />
               <line x1="28" y1="12" x2="12" y2="28" stroke="white" stroke-width="2" />
             </svg>
            </div>
         </div>

         <div class="max-w-[300px] m-auto  p-[20px] pt-[20px]">
            @foreach ($allRoutes as $item)
            @include('saphir::saphir.sidebar.sidewidget',
            ['route' => $item->route ,
            'nameroute' => $item->label,
            'icon' =>  $item->icon]
            )
             
        @endforeach
           <div class="pl-[3px] text-[18px] flex"
           onclick="confirm('do you want reset Pagination?')
           || event.stopImmediatePropagation()"
     wire:click="resetPagination()"
           >
            <div class="pt-[2px]">
            <span class="material-icons text-[18px]">
                settings
                </span>
            </div>
            <div class="pl-[5px]">
            <span>Rezet Pagination</span>
           </div>
        </div>

            @include('saphir::saphir.sidebar.sidewidget2')
         </div>  

         

    </div>


    <div class="fixed w-full top-0 right-0 left-0 bottom-0 z-[100] 
    min-h-[100vh]
    bg-black text-white" x-show="showNavbar2">
      <div class="flex p-[5px] justify-end">
        <div>
           <svg @click="showNavbar2=false"
              width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
             <circle cx="20" cy="20" r="19" stroke="white" stroke-width="2" fill="none" />
              <line x1="12" y1="12" x2="28" y2="28" stroke="white" stroke-width="2" />
             <line x1="28" y1="12" x2="12" y2="28" stroke="white" stroke-width="2" />
            </svg>
        </div>
      </div>

      <div class="max-w-[300px] m-auto  p-[5px] pt-[20px]">
         
         <div class="pl-[3px] text-[18px] flex">
            <div class="pt-[2px]">
                <span class="material-icons text-[blue]">
                  person
                  </span>
            </div>
            <div class="pl-[5px]">
            <span>{{ucfirst($user->name)}}</span>
           </div>
        </div>

        <div class="pl-[3px] text-[18px] flex"
        onclick="confirm('do you want logout?')
               || event.stopImmediatePropagation()"
       wire:click="logout()"        
        >
         <div class="pt-[2px]">
            <span class="material-icons text-[red]">
               power_off
               </span>
         </div>
         <div class="pl-[5px]">
         <span>Logout</span>
        </div>
     </div>

      </div>

    </div>




</div>