<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Saphir7 extends Component
{
    public $label ;
    public $icon ;
    public $active ;
    public $record ;

    public function mount($id)
    {
      $this->record = \Saphir\Saphir\Models\Saphircrud::find($id) ;
      if (!$this->record) {
        return $this->redirect('/admin/route-generator', navigate: true);
      }

      $this->label =  $this->record->label ;
      $this->icon =  $this->record->icon ;
      $this->active =  $this->record->active ;
    }

    public function ajouter()
    {
        $validated = $this->validate([ 
            'label' => ['required','min:3'],
            'icon' => ['required'],
            'active' => ['required'],
        ]
        ); 

        $this->record->label = $this->label ;
        $this->record->icon = $this->icon ;
        $this->record->active = $this->active;
        $this->record->save();

        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Routes modified!');"); 
        return $this->redirect('/admin/route-generator', navigate: true);
    }
    
    public function render()
    {
        return view('saphir::livewire.saphir7',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}