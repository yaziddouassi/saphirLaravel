<?php

namespace Saphir\Saphir\Livewire;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Url;
use Exception;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Listing extends Component
{
    use WithFileUploads;
   
    public $search = null;

    protected $queryString = [
        'search' => [ 'keep' => true,'defer' => true],
    ];

    #[Url(keep: true)] 
    public $tableFilters = array();

    public $saphirFile0pens =  [];

    protected $queryFilter;
    protected $tables;

    public $groupId = [];
    public $activeId = null;
   

    public $actionsDiv1 = false;
    public $filtersDiv1 = false;

    public $searchDefault = null;
    public $searchSession = false;
    public $listingSearchs = array() ;

    public $paginationPerPage = null;
    public $paginationField = null;
    public $paginationOrder = null;


    public $listingFilterTypes = array() ;
    public $listingFilterDefaults = array() ;
    public $listingFilterSessions = array() ;
    public $listingFilterLabels = array() ;
    public $listingFilterTabs = array() ;
    public $listingFilterTabLabels = array() ;

    public $listingActions = array() ;
    public $listingActionIcons = array() ;
    public $listingActionIconColors = array() ;
    public $listingActionLabels = array() ;
    public $listingActionLabelColors = array() ;
    public $listingActionConfirms = array() ;


    public $listingCustoms = array() ;
    public $listingCustomOpens = array() ;
    public $listingCustomTypes = array() ;
    public $listingCustomInputs = array() ;
    public $listingCustomOnModals = array() ;
    public $listingCustomLabels = array() ;
    public $listingCustomIcons = array() ;
    public $listingCustomTitles = array() ;
    public $listingCustombackgrounds = array() ;
    public $listingCustomColorTexts = array() ;
    public $listingCustomColorIcons = array() ;


 /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

public function PaginationInitPagination() {

   
}

public function PaginationInitQuery() {
    $this->paginationPerPage = $this->paginationPerPageList[0] ;
    $this->paginationField = $this->paginationFieldList[0] ;
    $this->paginationOrder = $this->paginationOrderList[0] ;

    $temp = 'saphirPagination.'. $this->saphirModel . '.paginationPerPage' ; 

    if (Session::has($temp)) {
      $this->paginationPerPage = Session::get($temp);
      if (!in_array(Session::get($temp), $this->paginationPerPageList)) {
        Session::forget($temp) ;
        $this->paginationPerPage = $this->paginationPerPageList[0] ;
    }
    }

   if (!Session::has($temp)) {
      Session::put($temp ,$this->paginationPerPage)   ; 
        }

    $temp = 'saphirPagination.'. $this->saphirModel . '.paginationField'; 
    
    if (Session::has($temp)) {
        $this->paginationField = Session::get($temp);
        if (!in_array(Session::get($temp), $this->paginationFieldList)) {
            Session::forget($temp) ;
            $this->paginationField = $this->paginationFieldList[0] ;
        }
            }
        
    if (!Session::has($temp)) {
          Session::put($temp ,$this->paginationField)   ; 
                }

    $temp = 'saphirPagination.'. $this->saphirModel . '.paginationOrder'; 

    if (Session::has($temp)) {
        $this->paginationOrder = Session::get($temp);
        if (!in_array(Session::get($temp), $this->paginationOrderList)) {
            Session::forget($temp) ;
            $this->paginationOrder = $this->paginationOrderList[0] ;
        }
                }
                    
    if (!Session::has($temp)) {
        Session::put($temp , $this->paginationOrder)   ; 
                }


  }


public function PaginationPerPageValue() {
    Session::put('saphirPagination.'. $this->saphirModel . '.paginationPerPage',
    $this->paginationPerPage);
  }

public function PaginationFieldValue() {
    Session::put('saphirPagination.'. $this->saphirModel . '.paginationField' ,
    $this->paginationField);
  }

public function PaginationOrderValue() {
    Session::put('saphirPagination.'. $this->saphirModel . '.paginationOrder' ,
    $this->paginationOrder);
  }
 

    /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
    
    public function SearchAddField($a)
    {
        $key = array_key_exists($a, $this->listingSearchs);

        if ($key == false) {
            $this->listingSearchs[$a] = $a;
           }
    }


    public function SearchValue($a)
    {
        $this->search = $a; 
        $this->searchDefault = $a;
    }

    public function SearchPersist()
    {
        $this->searchSession = true;
    }

    
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
   
    public function FilterAddText($a)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === false) {
            $this->tableFilters[$a] = null;
            $this->listingFilterDefaults[$a] = null;
            $this->listingFilterTypes[$a] = 'text';
            $this->listingFilterSessions[$a] = false;
            $this->listingFilterLabels[$a] = $a;
           }
    }

    public function FilterAddCheckbox($a)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === false) {
            $this->tableFilters[$a] = false;
            $this->listingFilterDefaults[$a] = false;
            $this->listingFilterTypes[$a] = 'checkbox';
            $this->listingFilterSessions[$a] = false;
            $this->listingFilterLabels[$a] = $a;
           }
    }


    public function FilterAddDate($a)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === false) {
            $this->tableFilters[$a] = null;
            $this->listingFilterDefaults[$a] = null;
            $this->listingFilterTypes[$a] = 'date';
            $this->listingFilterSessions[$a] = false;
            $this->listingFilterLabels[$a] = $a;
           }
    }


    public function FilterAddSelect($a,$b,$c)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === false) {
            $this->tableFilters[$a] = null;
            $this->listingFilterDefaults[$a] = null;
            $this->listingFilterTypes[$a] = 'select';
            $this->listingFilterSessions[$a] = false;
            $this->listingFilterLabels[$a] = $a;
            $this->listingFilterTabs[$a] = $b;
            $this->listingFilterTabLabels[$a] = $c;
           }
       
    }


    public function FilterTextValue($a,$b)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($b === "") {
            $b = null ;
        }

        if ($key === true) {
            $this->tableFilters[$a] = $b;
            $this->listingFilterDefaults[$a] = $b;
           }
    }

    public function FilterSelectValue($a,$b)
    {

       $key = array_key_exists($a, $this->tableFilters);

        

        if (!in_array($b, $this->listingFilterTabs[$a]) ) {
            $b = null ;
        }

        if ($b === "") {
            $b = null ;
        }

       if ($key === true) {
            $this->tableFilters[$a] = $b;
            $this->listingFilterDefaults[$a] = $b;
           }

          

    }

    public function FilterDateValue($a, $b)
    {

        $key = array_key_exists($a, $this->tableFilters);

      

       
        $date = Carbon::createFromFormat('Y-m-d', $b);
    
        // Check if the parsed date is valid and matches the original string
        if ($date->format('Y-m-d') !== $b) {
            $b = null;
        }

        if ($key === true) {
            $this->tableFilters[$a] = $b;
            $this->listingFilterDefaults[$a] = $b;
           }
    }


    public function FilterCheckboxValue($a, $b)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === true) {
            $this->tableFilters[$a] = $b;
            $this->listingFilterDefaults[$a] = $b;
           }
    }

    public function FilterLabel($a,$b)
    {

        $key = array_key_exists($a, $this->tableFilters);

        if ($key === true) {
            $this->listingFilterLabels[$a] = $b;
           }
    }


    public function FilterPersist($a)
    {

        $key = array_key_exists($a, $this->listingFilterSessions);

        if ($key === true) {
            $this->listingFilterSessions[$a] = true;
        }  
    }

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

    public function ActionAdd($a,$b,$c,$d)
    {
       
        $key = array_key_exists($a, $this->listingActions);

        if ($key === false) {
            $this->listingActions[$a] = $a;
            $this->listingActionLabels[$a] = $b;
            $this->listingActionConfirms[$a] = $c;
            $this->listingActionIcons[$a] = $d;
            $this->listingActionLabelColors[$a] = 'white';
            $this->listingActionIconColors[$a] = 'white';
           }
    }

    public function ActionLabelColor($a,$b)
    {
        $key = array_key_exists($a, $this->listingActions);
        if ($key === true) {
            $this->listingActionLabelColors[$a] = $b;
           }     
    }

    public function ActionIconColor($a,$b)
    {
        $key = array_key_exists($a, $this->listingActions);
        if ($key === true) {
            $this->listingActionIconColors[$a] = $b;
           }     
    }

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////


    public function CustomAdd($a,$b,$c)
    {

        $key = array_key_exists($a, $this->listingCustoms);

        if ($key === false) {
            $this->listingCustoms[$a] = $a;
            $this->listingCustomOpens[$a] =false;
            $this->listingCustomLabels[$a] = $b;
            $temp = $b .' the record' ;
            $this->listingCustomTitles[$a] = $temp;
            $this->listingCustomIcons[$a] = $c;
            $this->listingCustombackgrounds[$a] = 'darkblue';
            $this->listingCustomColorTexts[$a] = 'white';
            $this->listingCustomColorIcons[$a] = 'white' ;
            $this->listingCustomOnModals[$a] = 'RecordInit' ;
           }

    }

    
    public function CustomInput($a,$b,$c)
    {
      
        $key2 = array_key_exists($a, $this->listingCustoms);
        $key = array_key_exists($a, $this->listingCustomTypes);
        
            if ($key2 === true) {
            
               if ($key == false) {
                  $this->listingCustomTypes[$a][0] = 'saphir::darkmode.' .$b ;
                  $this->listingCustomInputs[$a][0] = $c ;
               }

               else if ($key == true) {
                $temp = count($this->listingCustomTypes[$a]) ;
                $this->listingCustomTypes[$a][$temp] = 'saphir::darkmode.' .$b ;
                $this->listingCustomInputs[$a][$temp] = $c ;
               }
            
            } 
        
    }

   

    public function CustomModal($a,$b)
    {
           $key = array_key_exists($a, $this->listingCustoms);
           if ($key === true) {
               $this->listingCustomOnModals[$a] = $b;
              } 
    }


    public function CustomTitle($a,$b)
    {
        $key = array_key_exists($a, $this->listingCustoms);
        if ($key === true) {
            $this->listingCustomTitles[$a] = $b;
           } 
    }

    public function CustomBackground($a,$b)
    {
        $key = array_key_exists($a, $this->listingCustoms);
        if ($key === true) {
            $this->listingCustombackgrounds[$a] = $b;
           }
               
    }

    public function CustomColorText($a,$b)
    {
        $key = array_key_exists($a, $this->listingCustoms);
        if ($key === true) {
            $this->listingCustomColorTexts[$a] = $b;
        }  
    }

    public function CustomColorIcon($a,$b)
    {
        $key = array_key_exists($a, $this->listingCustoms);
        if ($key === true) {
            $this->listingCustomColorIcons[$a] = $b;
        }  
    }

    public function RecordInit()
    {
       
         foreach ($this->saphirFiles as $key => $value) {
            $this->saphirFiles[$key] = null ;
         }


         $this->saphirRecord = $this->listingModelClass::find($this->activeId);
         
          if($this->saphirRecord == null) {
            foreach ($this->listingCustomOpens as $cle => $value) {
                $this->listingCustomOpens[$cle] = false ;
            }
            $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
            notyf.error('Record dont exist');"); 
         }

         foreach ($this->saphirFields as $key => $value) {
            $this->saphirFields[$key] = null ;
            if (in_array($key,$this->saphirRecord->getFillable())) {
                $this->saphirFields[$key] = $this->saphirRecord[$key]  ;
            } 
         }

         $this->resetValidation();

         
    }

    /////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

    public function InitListing() {
        $this->tableFilters = array();
        $this->SearchValue('');
        $this->PaginationInitQuery();
        $this->InitCustom();
        $this->InitAction() ; 
        $this->InitSearch() ;
        $this->InitFilter() ;
         
      
    }

   


    public function InitCustom() {}
    public function InitAction() {}
    public function InitSearch() {}
    public function InitFilter() {}
    public function InitQuery() {}
    public function InitPagination(){}

    public function AllInit() {

        $this->queryFilter = $this->listingModelClass::select('*');


     if($this->searchSession === true) {
        if (Session::has('saphir.'. $this->saphirModel . '.search')) {
            $this->search =  Session::get('saphir.'. $this->saphirModel . '.search');
            if (Session::get('saphir.'. $this->saphirModel . '.search') === "") {
                $this->search =  null;
            }
        }
     }


     if($this->searchSession === false) {
        Session::forget('saphir.'. $this->saphirModel . '.search');
     }

    
     foreach ($this->tableFilters as $cle => $valeur) {
           if ($this->listingFilterSessions[$cle] === true) {
            
             if (Session::has('saphirFilter.' . $this->saphirModel .$cle)) {
                $this->tableFilters[$cle] =  Session::get('saphirFilter.' . $this->saphirModel .$cle);
                if (Session::get('saphirFilter.' . $this->saphirModel .$cle) === "") {
                    $this->tableFilters[$cle] =  null;
                }
            }
           }

           if ($this->listingFilterSessions[$cle] === false) {
            Session::forget('saphirFilter.' . $this->saphirModel .$cle);
           }
     }

      if ($this->search !== null) {
        foreach ($this->listingSearchs as $key => $value) {
            $this->queryFilter->orwhere($value, 'like', '%' . $this->search . '%');
                }
      }

        $this->InitQuery();
   
        $this->tables = $this->queryFilter->orderBy($this->paginationField,$this->paginationOrder)
                     ->paginate($this->paginationPerPage);
    
  
    }



/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////



    public function SearchChange()
    {
        if ($this->searchSession === true) {
            Session::put('saphir.'. $this->saphirModel . '.search',$this->search) ;
            if ($this->search === "") {
                $this->search = null ;
            }
        } 
    }

    public function SearchReset()
    {
        
        $this->search = null ;
        if ($this->searchSession === true) {
            Session::put('saphir.'. $this->saphirModel . '.search',"") ;
        }    
       
    }


    public function changeFilterField($a)
    {
        
        if ($this->listingFilterSessions[$a] == true) {
            Session::put('saphirFilter.' . $this->saphirModel .$a,
            $this->tableFilters[$a]) ;
            if ($this->tableFilters[$a] === "") {
                $this->tableFilters[$a] = null ;
            }
        }

       

    }

    public function resetFilterField($a)
    {
        $this->tableFilters[$a] = null ;
        if ($this->listingFilterSessions[$a] === true) {
            Session::put('saphirFilter.' . $this->saphirModel .$a,"") ;
        } 
    }


    public function changeFilterFieldCheckbox($a,$b)
    {
        if ($this->listingFilterSessions[$a] == true) {
            Session::put('saphirFilter.' . $this->saphirModel .$a,$this->tableFilters[$a]) ;
        }
       
    
    }


    public function resetAll()
    {
        
        $this->SearchReset();

        foreach ($this->tableFilters as $cle => $valeur) {
            
            $this->tableFilters[$cle] = null ;
            if ($this->listingFilterTypes[$cle] === 'checkbox') {
                $this->tableFilters[$cle] = false ;   
            }
            
            if ($this->listingFilterSessions[$cle] === true) {
                Session::put('saphirFilter.' . $this->saphirModel .$cle,
                $this->tableFilters[$cle]) ;
                if ($this->tableFilters[$cle] === null) {
                    Session::put('saphirFilter.' . $this->saphirModel .$cle,"") ;  
                }
               }
        }

      
    
    }

    //////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    public function saphirInsertAll($a , $b) {

        foreach ($this->saphirFields as $key => $value) {
            if (in_array($key, $a)) {
                $this->saphirRecord[$key] = $this->saphirFields[$key] ;
           }
         }

        $randomString = Str::random(10);
        $randomString;
        foreach ($this->saphirFiles as $key => $value) {
         if (in_array($key, $b)) {
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


    }


    public function saphirCloseModal() {

        foreach ($this->listingCustomOpens as $cle => $value) {
            $this->listingCustomOpens[$cle] = false ;
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


    ///////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////
    
    public function render()
    {
        
       
        return view('saphir::livewire.listing');
    }

}