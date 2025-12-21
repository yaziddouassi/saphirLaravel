<?php

namespace Saphir\Saphir\Livewire;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SaphirCreator extends Component
{

    public $saphirPreviewUrl = [] ;

     public function initSaphirPreviewUrl()
    {
        foreach ($this->saphirFiles as $key => $value) {
            $this->saphirPreviewUrl[$key] = null ;
         }
    }

     public function initSaphir()
    {
      $this->initSaphirPreviewUrl();
    }

    public function saphirInsert()
    {
        $this->saphirRecord = new $this->saphirModelClass;

       foreach ($this->saphirFields as $key => $value) {
           if (in_array($key,$this->saphirRecord->getFillable())) {
              $this->saphirRecord[$key] = $value ;
            }
       }

       foreach ($this->saphirPasswords as $key => $value) {
        if (in_array($key,$this->saphirRecord->getFillable())) {
           $this->saphirRecord[$key] = Hash::make($value) ;
         }
     }

       foreach ($this->saphirMultiples as $key => $value) {
        if (in_array($key,$this->saphirRecord->getFillable())) {
           $this->saphirRecord[$key] = $value ;
         }
    }
      

       $now = now();
       $this->saphirRecord['created_at'] = $now;
       $this->saphirRecord['updated_at'] = $now;

       $this->saphirUpload();
       $this->initSaphirPreviewUrl();
      
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

            $this->saphirRecord[$cle] =  $temp;  
    
           }
     

    }

    public function saphirRename() {
        $tabValidation = [];

        // Loop through saphirFields
        foreach ($this->saphirFields as $key => $value) {
            $tabValidation["saphirFields.$key"] = $key;
        }

        foreach ($this->saphirPasswords as $key => $value) {
            $tabValidation["saphirPasswords.$key"] = $key;
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
        

    public function saphirReset()
    {
        foreach ($this->saphirFields as $key => $value) {
            $this->saphirFields[$key] = null ;
         }

         foreach ($this->saphirPasswords as $key => $value) {
            $this->saphirPasswords[$key] = null ;
         }

         foreach ($this->saphirMultiples as $key => $value) {
            $this->saphirMultiples[$key] = [] ;
         }

         foreach ($this->saphirMultipleFiles as $key => $value) {
            $this->saphirMultipleFiles[$key] = [] ;
         }

         foreach ($this->saphirFiles as $key => $value) {
            $this->saphirFiles[$key] = null ;
         }
    }

    public function saphirDeleteFileByKey($a,$b) {
        unset($this->saphirMultipleFiles[$a][$b]);
     }
    
    
    public function render()
    {
        return view('saphir::livewire.saphircreator',
        ['counter' => 'hello']);
    }

}
