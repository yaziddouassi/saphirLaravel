<?php

namespace Saphir\Saphir\Livewire;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WizardCreator extends Component
{
    
    public $wizardCount = 1;
    public $wizardSteps = 0 ;
    public $wizardLabels = array() ;

    
    public function saphirReset()
    {
        foreach ($this->saphirFields as $key => $value) {
            $this->saphirFields[$key] = null ;
         }

         foreach ($this->saphirFiles as $key => $value) {
            $this->saphirFiles[$key] = null ;
         }
    }



    public function wizardInit($steps,$labels)
    {
        $this->wizardSteps = $steps;
       
        foreach ($labels as $key => $value) {
            $this->wizardLabels[$key + 1] = $value;
        }
    }

 
    public function conteneurWizardBack()
    {
        $this->wizardCount = $this->wizardCount - 1 ;
    }


    public function conteneurWizardNext()
    {
        $this->wizardValidation($this->wizardCount);
        $this->wizardCount = $this->wizardCount + 1 ;
    }

    
    public function conteneurWizardCreate()
    {
        
        $this->wizardValidation($this->wizardCount);
        $this->wizardCreate();
        $this->wizardCount = 1 ;
    }
    
    public function conteneurWizardCreateOther()
    {
        
        $this->wizardValidation($this->wizardCount);
        $this->wizardCreateOther();
        $this->wizardCount = 1 ;
    }


    public function saphirUpload()
    {
     $randomString = Str::random(10);
     $randomString;
     
     foreach ($this->saphirFiles as $key => $value) {
      
      if($this->saphirFiles[$key] != null) {
      $ext = $this->saphirFiles[$key]->getClientOriginalName();
      $name1 = time(). '-'. $randomString .'-'.$ext;
      $folder = $this->saphirModel . '/'  .$key ;
      $name2 = $folder. '/' . $name1;
      $this->saphirFiles[$key]->storeAs($folder,$name1, 'public');
      $this->saphirRecord[$key] =  $name2;
        }

     }
 }


 public function saphirRename() {
    $tabValidation = [];

    // Loop through saphirFields
    foreach ($this->saphirFields as $key => $value) {
        $tabValidation["saphirFields.$key"] = $key;
    }
    
    // Loop through saphirFiles
    foreach ($this->saphirFiles as $cle => $item) {
        $tabValidation["saphirFiles.$cle"] = $cle;
    }

    return $tabValidation;
}



    public function render()
    {
        return view('saphir::livewire.wizardcreator');
    }
}