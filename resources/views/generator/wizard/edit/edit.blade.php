<div class="min-[800px]:flex w-full">

    @livewire('saphir.sidebar')
    
     <div class="min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]">
       
        @include('saphir::formTop')

        @include('saphir::wizardTop')

        <div id="conteneur"
        class="grid max-[600px]:grid-cols-1
          max-[1000px]:grid-cols-2 grid-cols-3 p-[10px] gap-[10px]">

          @if ($wizardCount == 1)
           @include('saphir::inputText',
             ['field' => 'name',
              'label' => 'Name',
              'required' =>true,
            ])
        @endif
        
        @if ($wizardCount == 2) 
          @include('saphir::inputText',
                ['field' => 'city',
                'label' => 'City',
                   'required' =>true,
                  ])
        @endif


       
        </div>


        
        @include('saphir::wizardUpdateButtons')
       
     </div>

     
     
 </div>

