<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Sidebar extends Component
{  
    public $allRoutes ;
    public $user ;

    public function Mount($allRoutes,$user)
    {
        $this->allRoutes = $allRoutes;
        $this->user = $user;
    } 

    public function resetPagination()
    {
        
        $searchString = 'saphirPagination';

        $sessionKeys = array_keys(Session::all());
        
        foreach ($sessionKeys as $key) {
            
            if (str_contains($key, $searchString)) { // For PHP 8+, use str_contains
                Session::forget($key); // Remove the session key
            }
        }

        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Pagination Restarted');"); 
        
    }

    public function logout()
    {
        Auth::logout();
        
        // Redirect to the login page or any other page
        return redirect('/');
    }


    public function render()
    {
        return view('saphir::livewire.sidebar');
    }
}