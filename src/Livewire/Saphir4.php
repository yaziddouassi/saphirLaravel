<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Saphir4 extends Component
{
    
    public function toggle($a , $b) {

        if ($b == 1) {
            \Saphir\Saphir\Models\Saphircrud::where('id',$a)
                          ->update(['active' => false]) ;
        }
        if ($b == 2) {
            \Saphir\Saphir\Models\Saphircrud::where('id',$a)
                          ->update(['active' => true]) ;
        }

        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Route updated!');"); 
    }

    public function deleteById($id) {

        \Saphir\Saphir\Models\Saphircrud::destroy($id) ;
        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Route deleted!');"); 
    }

    public function render()
    {
        return view('saphir::livewire.saphir4',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'allRoutes2' => \Saphir\Saphir\Models\Saphircrud::get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}