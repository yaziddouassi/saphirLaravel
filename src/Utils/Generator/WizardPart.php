<?php

namespace Saphir\Saphir\Utils\Generator;

class WizardPart
{
public $piece1;
public $piece2;
public $piece3 ;
public $piece4;
public $piece5;
public $piece6 ;

public function getPiece7($a,$b,$c,$d,$e,$f,$g) {
    $this->piece7 = "Route::get('$a',$d)->middleware('$g');
Route::get('$b',$e)->middleware('$g');
Route::get('$c',$f)->middleware('$g');" ;
    return $this->piece7 ;
}

public function getPiece1($a,$b,$c,$d,$e,$f,$g) {

    $this->piece1 ="<?php

namespace $a;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Saphir\Saphir\Livewire\Listing;
use Livewire\Attributes\Url;


class Liste extends Listing
{
    use WithPagination;
    use WithFileUploads;

    public \$paginationPerPageList = [10,20,30,40,50];
    public \$paginationFieldList = ['id'];
    public \$paginationOrderList = ['asc','desc'];

    public \$saphirUrlStorage ;
    public \$saphirModel = \"$b\";
    public \$saphirModelLabel = \"$c\";
    public \$saphirModelName = \"$d\";
    public \$listingRoute = \"$e\";
    public \$listingModelClass = \"$f\";
    public \$saphirFields = [];
    public \$saphirFiles =  [];
    public \$saphirRecord = null;


    public function mount() {
        \$this->saphirUrlStorage =  config('saphir.urlstorage');
        \$this->InitListing();
    }

    public function InitCustom() {}
    public function InitAction() {}
    public function InitSearch() { }
    public function InitFilter() {}
    public function InitQuery() {}
    
   

    public function deleteById(\$id) {
        \$this->listingModelClass::destroy(\$id);
        \$this->js(\"const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Record deleted');\"); 
    }

    public function render()
    {
       
        \$this->AllInit();
        return view('$g',
                   ['entities' => \$this->tables,
         'allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
          'user' => \Illuminate\Support\Facades\Auth::user() ,          
                   ])
        ->layout('saphir::layouts.app2');
    }
}
";
    return $this->piece1 ;
}


public function getPiece2($a,$b,$c,$d,$e,$f,$g,$h) {
    $this->piece2 ="<?php

namespace $a;

use Livewire\Component;
use Saphir\Saphir\Livewire\WizardCreator;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;


class Create extends WizardCreator
{

    use WithFileUploads;

    public \$saphirUrlStorage ;
    public \$saphirModel = \"$b\";
    public \$saphirModelName = \"$c\";
    public \$saphirModelLabel = \"$d\";
    public \$saphirModelTitle = \"$e\";
    public \$saphirModelClass = \"$f\";
    public \$saphirRouteListe = \"$g\";
    public \$saphirRecord = null;
    public \$saphirFields = ['name' => null,'city' => null];
    public \$saphirFiles =  [];
    public \$wizardStops =  []; 
    public \$wizardShowOther = true ;

    public function mount() {
        \$this->saphirUrlStorage =  config('saphir.urlstorage');
        \$this->wizardInit(2,['First','Second']);
    }
    
    public function wizardValidation(\$a) {

        if (\$a == 1) {
            \$validated = \$this->validate([ 
                'saphirFields.name' => ['required'],
            ],[],
            \$this->saphirRename());
        }

        if (\$a == 2) {
            \$validated = \$this->validate([ 
                'saphirFields.city' => ['required'],
            ],[],
            \$this->saphirRename());
        }

    }

    public function wizardCreateOther()
    {

        \$this->saphirInsert();
        \$this->saphirReset();
        
       \$this->js(\"const notyf = new Notyf({position: {x: 'right',y: 'top'}});
       notyf.success('Record Created');\");
    }


    public function wizardCreate()
    {
      \$this->wizardCreateOther();
     
       return \$this->redirect(\$this->saphirRouteListe, navigate: true);
    }


    public function saphirInsert()
    {
        \$this->saphirRecord = new \$this->saphirModelClass;
       foreach (\$this->saphirFields as \$key => \$value) {
           if (in_array(\$key,\$this->saphirRecord->getFillable())) {
              \$this->saphirRecord[\$key] = \$value ;
            }
       }
      
       \$now = now();
       \$this->saphirRecord['created_at'] = \$now;
       \$this->saphirRecord['updated_at'] = \$now;

       \$this->saphirUpload();
       \$this->saphirRecord->save() ;

    }


    public function render()
    {
        return view('$h',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
              ->layout('saphir::layouts.app');
    }
}


";
    return $this->piece2 ;
}


public function getPiece3($a,$b,$c,$d,$e,$f,$g,$h) {

    $this->piece3 ="<?php

namespace $a;

use Livewire\Component;
use Saphir\Saphir\Livewire\WizardUpdate;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Edit extends WizardUpdate
{

    use WithFileUploads;

    public \$saphirUrlStorage ;
    public \$saphirModel = \"$b\";
    public \$saphirModelName = \"$c\";
    public \$saphirModelLabel = \"$d\";
    public \$saphirModelTitle = \"$e\";
    public \$saphirModelClass = \"$f\";
    public \$saphirRouteListe = \"$g\";
    public \$saphirRecord = null;
    public \$saphirFields = ['name' => null,'city' => null];
    public \$saphirFiles =  [];
    public \$wizardStops =  []; 

    public function mount(\$id) {

        \$this->saphirUrlStorage =  config('saphir.urlstorage');
        \$this->saphirInit(\$id); 
        \$this->wizardInit(2,['First','Second']);

    }


    public function wizardValidation(\$a) {

        if (\$a == 1) {
            \$validated = \$this->validate([ 
                'saphirFields.name' => ['required'],
            ],[],
            \$this->saphirRename());
        }

        if (\$a == 2) {
            \$validated = \$this->validate([ 
                'saphirFields.city' => ['required'],
            ],[],
            \$this->saphirRename());
        }

    }


    public function saphirUpdate()
    {
       foreach (\$this->saphirFields as \$key => \$value) {
           if (in_array(\$key,\$this->saphirRecord->getFillable())) {
             if(\$value != null &&  \$value != ''  && \$value != [] ) {
                \$this->saphirRecord[\$key] = \$value ;
              }
          }  
       }

       \$this->saphirUpload();

    \$this->saphirRecord->save() ;
    \$this->js(\"const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
    notyf.success('record updated');\"); 
return \$this->redirect(\$this->saphirRouteListe, navigate: true);
    }



    public function wizardUpdate() {
        \$this->saphirUpdate();
    }


    public function render()
    {
        return view('$h',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
              ->layout('saphir::layouts.app');
    }
}
";
    return $this->piece3 ;
}


public function getPiece4() {

    $this->piece4 ="<div class=\"min-[800px]:flex w-full\" x-data=\"admin(@this)\">

  @livewire('saphir.sidebar',['allRoutes' => \$allRoutes, 'user' => \$user])
    
     <div class=\"min-h-[100vh] w-full min-w-[900px]  overflow-x-auto  bg-[#DFDFDF]\">
  
      @include('saphir::list.listeTop')
      @include('saphir::list.listeFilters')

      
      <div class=\"overflow-x-auto p-[10px] pt-[15px]\">
        <table class=\"min-w-full bg-[#DDD] text-center  border \">
          <thead>
            <tr class=\"border-[darkblue]   border-b-[0px] border-t-[0px] text-[darkblue]\">
              <th class=\"py-[40px] px-[10px]  font-medium\"></th>
              <th class=\"py-3 px-[10px]  font-medium\">Id</th>
              <th class=\"py-3 px-[10px]  font-medium \">Actions</th>
            </tr>
          </thead>
          <tbody>
           

            @foreach (\$entities as \$item)
            <tr class=\"border-b even:bg-[#ddd] odd:bg-[#e4e4e4]\">
              <td class=\"min-w-[40px]\"> <input class=\"groupId\" @click=\"addtabs()\"
                 type=\"checkbox\" wire:ignore value=\"{{\$item->id}}\" id=\"{{\$item->id}}\"  />  </td>
              <td class=\"py-3 px-4\">{{\$item->id}}</td>
              <td class=\"py-3 px-4 w-[300px]\">
               
                 <x-saphir-all-btn>
                    
                      @include('saphir::customAllBtn')
                      @include('saphir::customEditBtn' ,['bg' =>'blue' ,
                      'color' => 'white','icon' =>'edit' ,'text' => ''])
                      @include('saphir::customDeleteBtn' ,['bg' =>'red' ,
                      'color' => 'white','icon' =>'delete_outline' ,'text' => '',
                      'confirmation' => 'Do you want to delete this record!'])
                     
                  </x-saphir-all-btn>
                
                
              </td>
            </tr>
            @endforeach
            
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
      
      @include('saphir::list.customs')
        
      <div class=\"p-[10px] pt-[20px]\">
        {{ \$entities->links('saphir::pagination.saphir') }}
      </div>
       
     </div>
 </div>
";
    return $this->piece4 ;
}

public function getPiece5() {

    $this->piece5 ="<div class=\"min-[800px]:flex w-full\">

    @livewire('saphir.sidebar',['allRoutes' => \$allRoutes, 'user' => \$user])
    
     <div class=\"min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]\">
      
        @include('saphir::formTop')

        @include('saphir::wizardTop')

        <div id=\"conteneur\"
        class=\"grid max-[600px]:grid-cols-1
          max-[1000px]:grid-cols-2 grid-cols-3 p-[10px] gap-[10px]\">

       
        @if (\$wizardCount == 1)
           @include('saphir::inputText',
             ['field' => 'name',
              'label' => 'Name',
              'required' =>true,
            ])
        @endif
        
        @if (\$wizardCount == 2) 
         
              @include('saphir::inputText',
                 ['field' => 'city',
                 'label' => 'City',
                 'required' =>true])
        @endif

       
        </div>

        @include('saphir::wizardButtons')

     </div>

 </div>

";
    return $this->piece5 ;
}


public function getPiece6() {

    $this->piece6 ="<div class=\"min-[800px]:flex w-full\"
x-data =\"{
  init() {
      Object.keys(\$wire.saphirFiles).forEach(key => {
                    \$wire.saphirFile0pens[key] = false;
                 });
    console.log(\$wire.saphirFile0pens) ;
  }
  }\"
>

    @livewire('saphir.sidebar',['allRoutes' => \$allRoutes, 'user' => \$user])
    
     <div class=\"min-h-[100vh] w-full max-w-[1150px]  overflow-x-auto  bg-[#DFDFDF]\">
       
        @include('saphir::formTop')

        @include('saphir::wizardTop')

        <div id=\"conteneur\"
        class=\"grid max-[600px]:grid-cols-1
          max-[1000px]:grid-cols-2 grid-cols-3 p-[10px] gap-[10px]\">

          @if (\$wizardCount == 1)
           @include('saphir::inputText',
             ['field' => 'name',
              'label' => 'Name',
              'required' =>true,
            ])
        @endif
        
        @if (\$wizardCount == 2) 
         
        @include('saphir::inputText',
        ['field' => 'city',
        'label' => 'City',
        'required' =>true])
       @endif
        </div>

        @include('saphir::wizardUpdateButtons')
       
     </div>

 </div>

 ";


    return $this->piece6 ;
}

}