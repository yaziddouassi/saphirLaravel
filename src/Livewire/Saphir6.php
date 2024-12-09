<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Saphir6 extends Component
{

    public $listModels = [];
    public $selected = []; 
    protected $transformString = null;

    public function mount()
    {
        $this->initModel();
        $this->listModels;
      
        $this->transformString = new \Saphir\Saphir\Utils\generator\TransformString();
        // dd($this->transformString->transformLink('VoitureMontre')) ;
    }

    public function initModel()
    {
        $path = app_path('Models');

        foreach (File::files($path) as $file) {
            
            $this->listModels[] =  pathinfo($file->getFilename(), PATHINFO_FILENAME);
        }

    }


    public function ajouter()
    {
        $validated = $this->validate([ 
            'selected' => ['required'],
        ]
        );  
        
        foreach ($this->selected as $key => $value) {
            $transformString = new \Saphir\Saphir\Utils\Generator\TransformString();
            $crud = new \Saphir\Saphir\Models\Saphircrud() ;
            $crud->model  =  $value;
            $crud->label  = $transformString->transformLink($value) ;
            $crud->route  = '/admin/' .  $transformString->transformUrl($value) ;
            $crud->icon  = 'description' ;
            $crud->active  = true ;
            $crud->save()  ;
        }
    
      $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
      notyf.success('Routes added!');"); 
      return $this->redirect('/admin/route-generator', navigate: true);
    }


    public function render()
    {
        return view('saphir::livewire.saphir6',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}