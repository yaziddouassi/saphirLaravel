<div x-data="{open:false}">
    
   <div class="flex mt-[15px]" @click="open=!open">
      <div>
         <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
            <circle cx="20" cy="20" r="19" stroke="blue" stroke-width="2" fill="none"/>
           

            <line x1="20" y1="12" x2="20" y2="28" stroke="blue" stroke-width="2"/>
  <!-- Ligne horizontale -->
           <line x1="12" y1="20" x2="28" y2="20" stroke="blue" stroke-width="2"/>
          </svg>
      </div>
      <div class=" pl-[15px] font-bold text-[24px] mt-[-1px]">
       DEV
      </div>
   </div>

   <div class="p-[5px] pl-[15px] mt-[10px] bg-[#111] " x-show="open">

    
      <div class="text-[20px]">
        <a href="/admin/crud-generator" wire:navigate >
          
            <span class="material-icons text-[16px]">
              auto_stories
              </span>
          CRUD </a>
      </div>
      <div class="text-[20px]">
         <a href="/admin/wizard-generator" wire:navigate >
          <span class="material-icons text-[16px]">
            currency_rupee
            </span>
          WIZARD </a>
       </div>
       <div class="text-[20px]">
         <a href="/admin/chart-generator" wire:navigate >
          <span class="material-icons text-[16px]">
            incomplete_circle
            </span>
          CHART </a>
       </div>
       <div class="text-[20px]">
         <a href="/admin/widget-generator" wire:navigate >
          <span class="material-icons text-[16px]">
            app_settings_alt
            </span>
          WIDGET </a>
       </div>
       <div class="text-[20px]">
         <a href="/admin/route-generator" wire:navigate >
            <span class="material-icons text-[18px]">
              local_car_wash
              </span>
          ROUTER </a>
       </div>
 


   </div>

</div>