<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Saphir5 extends Component
{
    public $name = '' ;

    public function mount() {
      
        
    }

    public function ajouter() {
      
        $validated = $this->validate([ 
            'name' => ['required','min:3','regex:/^[A-Za-z][A-Za-z0-9]*$/'],
        ]
        ); 


        $this->name  = ucfirst($this->name);

        $a = 'App\Livewire\Saphir\Widgets' ;
        $b = $this->name;
        $temp = strtolower($this->name);
        $c = 'livewire.saphir.widgets.'. $temp ;

       $widget = new  \Saphir\Saphir\Utils\Generator\WidgetPart();
       $content1 =  $widget->getPiece1($a,$b,$c);
       $content2 =  $widget->getPiece2();

       $temp1 = 'app/Livewire/Saphir/Widgets/' . $this->name . '.php' ;
       $temp2 = 'resources/views/livewire/saphir/widgets/' . $temp . '.blade.php' ;

       $directoryPath1 = base_path('app/Livewire/Saphir/Widgets');

       if (!File::exists($directoryPath1)) {
        File::makeDirectory($directoryPath1, 0755, true);
    }

    $directoryPath2 = base_path('resources/views/livewire/saphir/widgets');

       if (!File::exists($directoryPath2)) {
        File::makeDirectory($directoryPath2, 0755, true);
    }

        $chemin1 = base_path($temp1);
        $chemin2 = base_path($temp2);
        File::put($chemin1, $content1);
        File::put($chemin2, $content2); 

        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Widget Created!');"); 
      
    }

    public function mount3() {
        $viewContent = view('saphir::generator.widget.widget1',
         ['value' => "{{\$value}}",'title' => "{{\$title}}",'icon' => "{{\$icon}}"])->render();
        $filePath = base_path('resources/views/example.blade.php');
     //  File::append($filePath, $viewContent);
        
    }

    
    public function render()
    {
        return view('saphir::livewire.saphir5',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}