<div class="flex w-full"  x-data="{ 
}">

    @livewire('saphir.sidebar',['allRoutes' => $allRoutes, 'user' => $user])
    
     <div class="min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]">
       
        <div class="p-[2px]">
            <div class="text-center h-[60px] pt-[10px] bg-[black] text-[white] font-bold text-[24px] ">
             CHART GENERATOR
            </div>
        </div>


        
        <div class="p-[10px] pt-[50px]">
        
        <div class=" p-[10px] pt-[5px] max-w-[400px] m-auto"> 
            
            <div class="text-center">
                <span class="text-[20px]">Create Charts:</span>
            </div>

            <div class="pt-[10px]">
                <input type="text" placeholder="Chart Name..." class="w-full h-[50px] bg-[#EEE]"
                 wire:model="chartName">
            </div>

            @error("chartName")
               <div class="text-[red] pt-[5px]">
                 <span class="error">{{ $message }}</span> 
              </div>
              @enderror

            <div class="pt-[10px]">
             <select class="w-full h-[50px] bg-[#EEE]" wire:model="chartType">
                @foreach ($chartListes as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
             </select>
            </div>
            

            <div class="pt-[15px] text-center">
                <button class="bg-[blue] text-[24px] w-[150px] text-white p-[7px] rounded-[3px]"
                wire:click="ajouter()">
                    GENERATE</button>
            </div>
        </div>

        
    </div>
        
       

     </div>

 
     
 </div>