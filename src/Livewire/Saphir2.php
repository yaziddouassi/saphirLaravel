<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Saphir2 extends Component
{
    public $chartName = null ;
    public $chartType = 'bar';
    public $chartListes = [] ;

    public function mount() {
       // $viewContent = view('saphir::generator.chart.chart1', ['chartId' => "{{\$chartId}}"])->render();
      //  $filePath = base_path('resources/views/example.blade.php');
       // File::append($filePath, $viewContent);
        $this->chartListes = ['bar','line','pie','doughnut','polarArea'] ;
    }

    public function ajouter() {
       
        $validated = $this->validate([ 
            'chartName' => ['required','min:3','regex:/^[A-Za-z][A-Za-z0-9]*$/'],
        ]
        ); 

        $this->chartName  = ucfirst($this->chartName);

        $a = 'App\Livewire\Saphir\Charts' ;
        $b = $this->chartName;
        $c = strtolower($this->chartName);
        $d = 'livewire.saphir.charts.'. $c ;

       $widget = new  \Saphir\Saphir\Utils\Generator\ChartPart();
       $content1 =  $widget->getPiece1($a,$b,$c,$d,$this->chartType);
       $content2 =  $widget->getPiece2();

       $temp1 = 'app/Livewire/Saphir/Charts/' . $this->chartName . '.php' ;
       $temp2 = 'resources/views/livewire/saphir/charts/' . $c . '.blade.php' ;

       $directoryPath1 = base_path('app/Livewire/Saphir/Charts');

       if (!File::exists($directoryPath1)) {
        File::makeDirectory($directoryPath1, 0755, true);
    }

    $directoryPath2 = base_path('resources/views/livewire/saphir/charts');

       if (!File::exists($directoryPath2)) {
        File::makeDirectory($directoryPath2, 0755, true);
    }

        $chemin1 = base_path($temp1);
        $chemin2 = base_path($temp2);
        File::put($chemin1, $content1);
        File::put($chemin2, $content2); 

        $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Chart Created!');"); 
    }

    public function render()
    {
        return view('saphir::livewire.saphir2',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
        ->layout('saphir::layouts.app');
    }
}