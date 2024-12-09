<div>
    @livewire('saphir.navbar',['allRoutes' => $allRoutes ,'user' => $user])

    <div class="max-[799px]:hidden  min-w-[240px] max-w-[240px] bg-black text-white h-full min-h-[100vh] p-[10px] pt-[5px]">
    <div class="p-[4px] bg-[blue] text-center border-[1px] font-bold border-white text-[22px] rounded-[2px] mb-[10px]">
        <a href="/admin" wire:navigate >DASHBOARD</a>
    </div>

    <div class="p-[4px]  text-center border-[1px] font-bold border-white text-[22px] rounded-[2px] mb-[10px]"
    onclick="confirm('do you want logout?')
               || event.stopImmediatePropagation()"
     wire:click="logout()"           
    >
        LOGOUT
    </div>
    
    
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