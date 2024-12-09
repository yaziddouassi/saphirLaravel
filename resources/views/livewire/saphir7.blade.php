<div class="flex w-full"  x-data="{ 
}">

    @livewire('saphir.sidebar',['allRoutes' => $allRoutes, 'user' => $user])
    
     <div class="min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]">
       
        <div class="text-center h-[60px] pt-[10px] bg-[#D5D5D5] text-[darkblue] font-bold text-[28px] ">
            WIDGET GENERATOR
        </div>

        
        <div class="p-[10px] pt-[20px]">
            
            <div class="bg-[#D5D5D5] p-[10px] pt-[5px] max-w-[400px] m-auto"> 
                
                <div class="text-center">
                    <span class="text-[20px]">Create WIDGET:</span>
                </div>

                <div class="pt-[15px] pb-[5px]">
                    <input type="text" class="w-full h-[50px] bg-[#EEE]"
                    placeholder="label..."
                    wire:model="label">
                </div>
                @error("label")
                    <div class="text-[red] pt-[5px]">
                      <span class="error">{{ $message }}</span> 
                    </div>
               @enderror

               <div class="pt-[15px] pb-[5px]">
                  <input type="text" class="w-full h-[50px] bg-[#EEE]"
                    placeholder="icon..."
                  wire:model="icon">
               </div>
               @error("icon")
                 <div class="text-[red] pt-[5px]">
                     <span class="error">{{ $message }}</span> 
                  </div>
                @enderror

                <div class="pt-[10px]">
                    <select class="w-full h-[50px] bg-[#EEE]" wire:model="active">
                          <option value="">Select Status</option>
                           <option value="1">Active</option>
                            <option value="0">Inactive</option>
                    </select>
                   </div>

                @error("active")
                   <div class="text-[red] pt-[5px]">
                       <span class="error">{{ $message }}</span> 
                    </div>
                  @enderror

                <div class="pt-[15px] text-center">
                    <button class="bg-[blue] text-[24px] w-[150px] text-white p-[7px] rounded-[3px]"
                    wire:click="ajouter()">
                        GENERATE</button>
                </div>
            </div>
    
            
        </div>
       

     </div>

 
     
 </div>