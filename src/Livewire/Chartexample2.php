<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;


class Chartexample2 extends Component
{
    public $data = [] ;
    public $labels = [] ;
    public $label ;
    public $chartId ;
    public $chartType ;
    public $backgroundColor = array() ;

    // ['bar','line','doughnut',pie',]

    public function mount()
    {
        $this->chartId = 'Chartexample2' ;
        $this->label = 'Best Sailings'  ;
        $this->data = [1,2,3,4]  ;
        $this->labels = ['first','second','third','four']  ;
        $this->chartType = 'line';
        $this->backgroundColor = [
                             'red',
                             'black',
                             'lime',
                             'rgb(75, 192, 192)',
                             'rgb(153, 102, 255)',
                             'rgb(255, 159, 64)'
        ];

       
    }


    public function chartchange()
    {
        $this->data= [1,2,3]  ;
        $this->labels = ['first','second','third']  ;
       
    }


    

    
    public function render()
    {
        return view('saphir::livewire.chartexample2');
    }
}
