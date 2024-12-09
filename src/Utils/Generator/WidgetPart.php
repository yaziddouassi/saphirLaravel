<?php

namespace Saphir\Saphir\Utils\Generator;

class WidgetPart
{

public $piece1 ;
public $piece2 ;

public function getPiece1($a,$b,$c) {

  $this->piece1 = "<?php

namespace $a;
use Livewire\Component;


class $b extends Component
{
    public \$title ;
    public \$value ;
    public \$icon  = 'account_circle' ;

    public function mount()
    {
       \$this->title = 'New Customers' ;
       \$this->value = '42K' ;
    }

    public function updateValue()
    {
        \$this->value = '46K' ;
    }

    public function render()
    {
        return view('$c');
    }
}
  
  ";

  return $this->piece1;
}

public function getPiece2() {
  $this->piece2 = "<div class=\"pb-[15px] pt-[15px]
 bg-[#DDD]   flex
 items-center justify-center\">


 <div>
    <div class=\"flex justify-center text-[green]\">
      <span class=\"block pr-[3px]\">
         {{\$title}} 
      </span>
      </span>
        <span class=\"material-icons block text-[blue]\">
           {{\$icon}}
         </span>
     </div>

     <div class=\"text-center font-bold text-[24px]\">
     {{\$value}}
      </div>

     

     <div class=\"text-center mt-[5px]\">
       <button class=\"bg-[darkblue] text-white w-[140px] p-[10px]\"
       wire:click=\"updateValue()\" >
           Update  </button>
      </div>
   </div>

</div>
  
  ";

  return $this->piece2;
}


    
}