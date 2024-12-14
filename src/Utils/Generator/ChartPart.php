<?php

namespace Saphir\Saphir\Utils\Generator;

class ChartPart
{

public $piece1 ;
public $piece2 ;

public function getPiece1($a,$b,$c,$d,$e) {

    $this->piece1 = "<?php

namespace $a;
use Livewire\Component;

class $b extends Component
{
    public \$data = [] ;
    public \$labels = [] ;
    public \$label ;
    public \$chartId ;
    public \$chartType ;
    public \$backgroundColor = array() ;

    public function mount()
    {
        \$this->chartId = 'charts-$c' ;
        \$this->label = 'Best Sailings'  ;
        \$this->data = [1,2,3,8]  ;
        \$this->labels = ['first','second','third','four']  ;
        \$this->chartType = '$e';
        \$this->backgroundColor = [
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
        \$this->data= [1,2,3]  ;
        \$this->labels = ['first','second','third']  ;
       
    }


    

    
    public function render()
    {
        return view('$d');
    }
}
";

    return $this->piece1;
}

public function getPiece2() {
  $this->piece2 = "<div  class=\"pb-[10px]
 bg-[#DDD]  min-h-[calc(50vh-46px)] flex
 items-center\"
x-data=\"{
 data : \$wire.entangle('data'),
 labels : \$wire.entangle('labels'),
 chart : null ,
 chartId : document.getElementById(\$wire.chartId),

init() {
this.chart = this.newchart(this.chartId,this.labels,this.data);

                      temp =  [
                            'red',
                             'black',
                             'lime',
                             'rgb(75, 192, 192)',
                             'rgb(153, 102, 255)',
                             'rgb(255, 159, 64)'
                           ] 

            }, 

changechart() {
    this.chart.clear(); 
    this.chart.destroy();
\$wire.chartchange().then(() => {
    this.chart = this.newchart(this.chartId,this.labels,this.data);
                });

},

newchart(element,labels,data) {

               return new Chart(element, {
                  type: \$wire.chartType,
                  data: {
                      labels: labels,
                      datasets: [{
                          label: \$wire.label,
                          data: data ,
                          backgroundColor: [...\$wire.backgroundColor],
                      }]
                  },
                  options: {
                      responsive: true,
                      maintainAspectRatio: false,
                  }
              });

            },

}\">

    <div class=\"w-full\">
      <div  style=\"position: relative;width: 100%;padding-top: 85%;\">
         <div style=\"position: absolute;top: 0;left: 0;width: 100%;height: 100%;max-height: none; \">
             <canvas  wire:ignore   id=\"{{\$chartId}}\" ></canvas>
         </div> 
       </div>

       <div class=\"text-center mt-[10px]\">
         <button @click=\"changechart\" class=\"border-[1px] border-black p-[8px]\">
             Update  </button>
        </div>
     </div>
   
 </div>";

  return $this->piece2;
}


    
}