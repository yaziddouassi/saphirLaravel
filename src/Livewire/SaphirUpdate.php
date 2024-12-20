<?php

namespace Saphir\Saphir\Livewire;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SaphirUpdate extends Component
{

   public $saphirFile0pens =  [];

   public function conteneurSaphirUpdate()
   {
    $this->saphirUpdate();
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
           $this->saphirRecord[$key] = json_encode($value) ;
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

     $this->rezetSaphirFiles();
     $this->rezetSaphirFile0pens();

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
        $this->saphirMultiples[$cle] = json_decode($this->saphirRecord[$cle]) ;
       } 
    }


}
    
    public function render()
    {
        return view('saphir::livewire.saphirupdate');
    }
    
}