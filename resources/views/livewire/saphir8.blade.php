<div class="bg-[#111]  text-white "
     x-data="{ showPassword: false }">
    
   <div class="flex items-center justify-center
    p-[10px] min-h-[100vh]">
   
      <div class="w-full max-w-[500px] p-[20px] pt-[10px] m-auto 
       bg-[#333] rounded-[10px]">
       
         <div class="text-center text-[24px] text-[blue] font-bold">
            {{ config('saphir.company') }}
         </div>

         <div class="text-center text-[20px]">
            Sign In
         </div>

         @if (session()->has('error'))
         <div class="bg-[red]  text-white rounded p-[15px]">
             {{ session('error') }}
         </div>
     @endif

       <form wire:submit.prevent="login">
         <div class="max-w-[500px] m-auto mt-[20px]">
            <label>Email Address<span class="text-[red]">*</span></label>
         </div>

         <div class="max-w-[500px] m-auto mt-[10px]">
             <input type="text"  wire:model="email" 
             class="w-full bg-[#555] h-[50px]
             focus:outline-none">
         </div>

         <div>
            @error('email') <span class="text-red-500 text-sm">
               {{ $message }}</span> @enderror
         </div>

         <div class="flex w-full max-w-[500px] bg-[#555] h-[50px] mt-[20px]
         border-[1px] border-[transparent] focus:bg-[blue]">
            <div class="w-full pt-[4px]">
                 <input wire:model="password"
                  :type="showPassword ? 'text' : 'password'"  
                 class="w-full bg-[#555] h-[42px] focus:bg-[#555] 
                 border-transparent focus:border-transparent focus:ring-0
                 focus:outline-none
                 ">
            </div>
            <div @click="showPassword = !showPassword" class="p-[6px] pt-[12px]">
                <i class="fa fa-eye text-[24px] text-[#ccc]"></i>
            </div>
        </div>

        <div>
         @error('password') <span class="text-red-500 text-sm">
            {{ $message }}</span> @enderror
      </div>

      <div class="pt-[10px]">
      <label class="flex items-center">
         <input type="checkbox" wire:model="remember" class="form-checkbox text-blue-600">
         <span class="ml-2 text-gray-700 text-sm">Remember Me</span>
     </label>
   </div>

         <div class="max-w-[500px] m-auto mt-[20px]">
            <button class="bg-[blue] text-[20px] text-white w-full h-[50px]">
                
                Sign In</button>
        </div>
      </form>

      </div>

   
   </div>

      <style>

input:-webkit-autofill {
    border: none;
    caret-color: #fff; /* Pour le I quand on édite */
    color: #fff;
    background: #555;
    /* webkit autofill */
    -webkit-text-fill-color: #fff; /* Surcharge la font color d'autofill */
    -webkit-background-clip: text; /* Supprime le background autofill, utile pour le border radius */
    box-shadow: 0 0 0 50px #555 inset; /* Ajoute un fake background à base d'ombrage aplatit */
}
      </style>

</div>

