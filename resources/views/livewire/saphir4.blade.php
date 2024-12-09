<div class="flex w-full"  x-data="{ 
}">

    @livewire('saphir.sidebar',['allRoutes' => $allRoutes, 'user' => $user])
    
     <div class="min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]">
       
        <div class="text-center h-[60px] pt-[10px] bg-[#D5D5D5] text-[darkblue] font-bold text-[28px] ">
            ROUTER LIST
        </div>

        <div class="text-right p-[5px]">
            <a href="/admin/route-generator/create" wire:navigate>
            <button class="bg-[blue] w-[100px] text-white rounded-[3px] p-[9px]">
                New
            </button>
            </a>
        </div>
        
        <div class="overflow-x-auto p-[10px] pt-[10px]">
            <table class="min-w-full bg-[#DDD] text-center  border ">
              <thead>
                <tr class="border-[darkblue]   border-b-[0px] border-t-[0px] text-[darkblue]">
                  <th class="py-3 px-[10px]  font-medium">Id</th>
                  <th class="py-3 px-[10px]  font-medium ">Model</th>
                  <th class="py-3 px-[10px]  font-medium ">Route</th>
                  <th class="py-3 px-[10px]  font-medium ">Label</th>
                  <th class="py-3 px-[10px]  font-medium ">Icon</th>
                  <th class="py-3 px-[10px]  font-medium ">Active</th>
                  <th class="py-3 px-[10px]  font-medium ">Modal</th>
                </tr>
              </thead>
              <tbody>
               
    
                @foreach ($allRoutes2 as $item)
                <tr class="border-b even:bg-[#ddd] odd:bg-[#e4e4e4]">
                  
                  <td class="py-3 px-4">{{$item->id}}</td>
                  <td class="py-3 px-4">{{$item->model}}
                  </td>
                  <td class="py-3 px-4">{{$item->route}}
                  </td>
                  <td class="py-3 px-4">{{$item->label}}
                </td>
                <td class="py-3 px-4">{{$item->icon}}
                </td>
                <td class="py-3 px-4">
                  @if ($item->active == 1)
                  <span class="material-icons text-[40px] text-[green] block pt-[5px]"
                  wire:click="toggle('{{$item->id}}','1')">
                    toggle_on
                    </span>
                  @endif
                  @if ($item->active == 0)
                  <span class="material-icons text-[40px] text-[red] block pt-[5px]"
                  wire:click="toggle('{{$item->id}}','2')">
                    toggle_off
                    </span>
                  @endif
                </td>
                <td class="py-3 px-4">
                    <a href="/admin/route-generator/edit/{{$item->id}}" wire:navigate>
                    <button class="bg-[blue] text-white min-w-[34px] rounded-[4px] pt-[5px]">
                        <span class="material-icons">
                            edit
                            </span>
                    </button>
                  </a>
                    <button onclick="confirm('do you want to delete this route')
                        || event.stopImmediatePropagation()"
                     wire:click="deleteById('{{$item->id}}')"
                    class="bg-[red] text-white min-w-[34px] rounded-[4px] pt-[5px]">
                        <span class="material-icons">
                            delete_forever
                        </span>
                    </button>
                </td>
                </tr>
                @endforeach
                
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        
       

     </div>

 
     
 </div>

 


