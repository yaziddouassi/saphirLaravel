<?php

namespace Saphir\Saphir\Livewire;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WizardUpdate extends Component
{
    
    public $wizardCount = 1;
    public $wizardSteps = 0 ;
    public $wizardLabels = array() ;
    public $saphirFile0pens =  [];


    public function wizardInit($steps,$labels)
    {
        $this->wizardSteps = $steps;
       
        foreach ($labels as $key => $value) {
            $this->wizardLabels[$key + 1] = $value;
        }
    }

    public function wizardValidation($a) {}
    public function wizardUpdate(){}
    public function wizardCreateOther(){}


    public function conteneurWizardBack()
    {
        $this->wizardCount = $this->wizardCount - 1 ;
    }


    public function conteneurWizardNext()
    {
        $this->wizardValidation($this->wizardCount);
        $this->wizardCount = $this->wizardCount + 1 ;
    }

    
    public function conteneurWizardUpdate()
    {
        $this->wizardValidation($this->wizardCount);
        $this->wizardUpdate();
        $this->wizardCount = 1 ;
        $this->rezetSaphirFile0pens();
        $this->rezetSaphirFiles();
    }


    public function rezetSaphirFile0pens() {

        foreach ($this->saphirFile0pens as $key => $value) {
            $this->saphirFile0pens[$key] = null ;
        }
    }

    public function rezetSaphirFiles() {

        foreach ($this->saphirFiles as $key => $value) {
            $this->saphirFiles[$key] = null ;
        }
    }
    

    public function saphirChanger() {
       
        foreach ($this->saphirFields as $key => $value) {
         if (in_array($key,$this->saphirRecord->getFillable())) {
            $this->saphirRecord[$key] = $value ;
            }
         }

         foreach ($this->saphirMultiples as $key => $value) {
            if (in_array($key,$this->saphirRecord->getFillable())) {
               $this->saphirRecord[$key] = $value ;
             }
        }
    
         $this->saphirUpload();
    
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

    foreach ($this->saphirMultiples as $key => $value) {
        $tabValidation["saphirMultiples.$key"] = $key;
    }

    foreach ($this->saphirMultipleFiles as $key => $value) {
        $tabValidation["saphirMultipleFiles.$key"] = $key;
    }
    
    // Loop through saphirFiles
    foreach ($this->saphirFiles as $cle => $item) {
        $tabValidation["saphirFiles.$cle"] = $cle;
    }

    return $tabValidation;
}


    public function saphirInit($id) {

      $this->saphirRecord = $this->saphirModelClass::find($id);
        if($this->saphirRecord == null) {
         return $this->redirect($this->saphirRouteListe, navigate: true);
        }
       foreach ($this->saphirFields as $cle => $fields) {
        if (in_array($cle,$this->saphirRecord->getFillable())) {
           $this->saphirFields[$cle] =  $this->saphirRecord[$cle];
          }
       } 
       
       foreach ($this->saphirMultiples as $cle => $fields) {
        if (in_array($cle,$this->saphirRecord->getFillable())) {
        $this->saphirMultiples[$cle] = $this->saphirRecord[$cle] ;
       } 
    }


   }


    public function render()
    {
        return view('saphir::livewire.wizardcreator');
    }
}