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
   public $saphirMultipleFileRecords =  [];
   public $saphirMultipleFileErrors =  [];

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


public function checkIfMultipleFileIsNotNull() {

    $tab1s = [] ;
    $tab2s = [] ;

    foreach ($this->saphirMultipleFiles as $key => $value) {
        $this->saphirMultipleFileErrors[$key] = 1;
        $tab1s["saphirMultipleFileErrors.$key"] = 'required';
        $tab2s["saphirMultipleFileErrors.$key"] = $key;

            if ($value == []) {
                if ($this->saphirMultipleFileRecords[$key] == []) {
                  $this->saphirMultipleFileErrors[$key] = null;
                }
            }

            if (in_array($key, $this->saphirNullables)) {
                $this->saphirMultipleFileErrors[$key] = 1; 
            }
        

    }

    $validated2 = $this->validate(
                   $tab1s
                   ,[], 
                  $tab2s
                 );

}

  
public function saphirChanger() {

    if($this->saphirMultipleFiles != []) {
        $this->checkIfMultipleFileIsNotNull() ;
    }
    
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


     foreach ($this->saphirMultipleFiles as $cle => $item) {
         
        $temp = [] ;
        foreach ($item as $key => $value) {
          $ext = $value->getClientOriginalName();
          $name1 = time(). '-'. $randomString .'-'.$ext;
          $folder = $this->saphirModel . '/'  .$cle  ;
          $name2 = $folder. '/' . $name1;
          $value->storeAs($folder,$name1, 'public');
          array_push($temp, $name2);
        }
        $mergedArray = array_merge($temp, $this->saphirMultipleFileRecords[$cle]);
        $this->saphirRecord[$cle] = $mergedArray ;  

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

    foreach ($this->saphirMultipleFiles as $cle => $fields) {
        if (in_array($cle,$this->saphirRecord->getFillable())) {
        $this->saphirMultipleFileRecords[$cle] = $this->saphirRecord[$cle] ;
       } 
    }


}


public function saphirDeleteFileByKey($a,$b) {
    unset($this->saphirMultipleFiles[$a][$b]);
 }

 public function saphirDeleteFileRecordByKey($a,$b) {
   unset($this->saphirMultipleFileRecords[$a][$b]);
 }


    
    public function render()
    {
        return view('saphir::livewire.saphirupdate');
    }
    
}