<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class Saphir8 extends Component
{
    
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function mount() {
        if (auth()->check()) {
            return $this->redirect('/admin', navigate: true);
        }
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->flash('message', 'Logged in successfully.');
            return $this->redirect('/admin', navigate: true);
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }
    
    

    public function render()
    {
        return view('saphir::livewire.saphir8')
        ->layout('saphir::layouts.app3');
    }
}