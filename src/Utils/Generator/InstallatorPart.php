<?php

namespace Saphir\Saphir\Utils\Generator;

class InstallatorPart
{

public $piece1 ;
public $piece2 ;
public $piece3 ;

public function getPiece1() {
    $this->piece1   = "<?php

namespace App\Livewire\Saphir;
use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        
      return view('livewire.saphir.admin',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}
   ";

   return $this->piece1;
}

public function getPiece2() {
     
    $this->piece2   = "<div class=\"min-[800px]:flex w-full\" x-data=\"\">

    @livewire('saphir.sidebar',['allRoutes' => \$allRoutes, 'user' => \$user])
     <div class=\"min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto bg-[#ccc]\">
 
        @include('saphir::topbar')

        <div id=\"conteneur\"
         class=\"grid max-[600px]:grid-cols-1
              max-[1000px]:grid-cols-2 grid-cols-3 p-[10px] pb-[10px] gap-[10px\">

                @livewire('saphir.widget')
                @livewire('saphir.widget')
                @livewire('saphir.widget')
                @livewire('saphir.chartexample')
                @livewire('saphir.chartexample2') 
                @livewire('saphir.chartexample3')
                            
        </div>
     </div>
 </div>
    
    ";

    return $this->piece2;

}

public function getPiece3() {
    $this->piece3 ="<?php

    use Illuminate\Support\Facades\Route;
    
    Route::get('/admin', App\Livewire\Saphir\Admin::class)->middleware('auth');   
        " ;
    
        return $this->piece3;
}
    
}