<?php

namespace Saphir\Saphir\Livewire;
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
use Livewire\Component;
use Illuminate\Support\Facades\File;


class Saphir1 extends Component
{
    
    public $listModels = [];
    public $selected ;
    public $middlewares;
    public $gardien;
    protected $transformString = null;

    public function mount()
    {
        $this->initModel();
        $this->listModels;
        $this->middlewares =  config('saphir.middlewareList');
    }


    public function ajouter()
    {
        $validated = $this->validate([ 
            'selected' => ['required'],
            'gardien' => ['required'],
        ]
        );  

       $tempchemin1  = 'app/Livewire/Saphir/' . $this->selected . '/Liste.php' ;
       $tempchemin2  = 'app/Livewire/Saphir/' . $this->selected . '/Create/Create.php' ;
       $tempchemin3  = 'app/Livewire/Saphir/' . $this->selected . '/Edit/Edit.php' ;
       $tempchemin4  = 'resources/views/livewire/saphir/' . strtolower($this->selected) .
        '/liste.blade.php' ;
       $tempchemin5  = 'resources/views/livewire/saphir/' . strtolower($this->selected) . 
       '/create/create.blade.php' ;
       $tempchemin6  = 'resources/views/livewire/saphir/' . strtolower($this->selected) . 
       '/edit/edit.blade.php' ;
      
      
       $tempdirectory1 = 'app/Livewire/Saphir/' . $this->selected  ;
       $tempdirectory2 = 'app/Livewire/Saphir/' . $this->selected . '/Create/' ;
       $tempdirectory3 = 'app/Livewire/Saphir/' . $this->selected . '/Edit/' ;
       $tempdirectory4 = 'resources/views/livewire/saphir/' . strtolower($this->selected)  ;
       $tempdirectory5 = 'resources/views/livewire/saphir/' . strtolower($this->selected) . 
       '/create'  ;
       $tempdirectory6 = 'resources/views/livewire/saphir/' . strtolower($this->selected) . 
       '/edit'  ;

       $directory1 = base_path($tempdirectory1);
       $directory2 = base_path($tempdirectory2);
       $directory3 = base_path($tempdirectory3);
       $directory4 = base_path($tempdirectory4);
       $directory5 = base_path($tempdirectory5);
       $directory6 = base_path($tempdirectory6);

       $namespace1 = "app\\Livewire\\Saphir\\" . $this->selected  ;
       $namespace2 = "app\\Livewire\\Saphir\\" . $this->selected ."\\Create" ;
       $namespace3 = "app\\Livewire\\Saphir\\" . $this->selected ."\\Edit" ;

       $ListeString = new \Saphir\Saphir\Utils\Generator\TransformString();
       $liste1 = $this->selected;
       $liste2 = $ListeString->transformLink($this->selected);
       $liste3 = $ListeString->transformDatabase($this->selected);
       $liste4 = "/admin/" . $ListeString->transformUrl($this->selected);
       $liste5 = "App\\Models\\" . $this->selected;
       $liste6 = "livewire.saphir." . strtolower($this->selected) . ".liste";

       $CreateString = new \Saphir\Saphir\Utils\Generator\TransformString();

       $create1 = $this->selected;
       $create2 = $CreateString->transformDatabase($this->selected);
       $create3 = $CreateString->transformLink($this->selected);
       $create4 = "Create " . $CreateString->transformLink($this->selected);
       $create5 = "App\\Models\\" . $this->selected;
       $create6 = "/admin/" . $CreateString->transformUrl($this->selected);
       $create7 = "livewire.saphir." . strtolower($this->selected) . ".create.create";


       $EditString = new \Saphir\Saphir\Utils\Generator\TransformString();

       $edit1 = $this->selected;
       $edit2 = $EditString->transformDatabase($this->selected);
       $edit3 = $EditString->transformLink($this->selected);
       $edit4 = "Update " . $EditString->transformLink($this->selected);
       $edit5 = "App\\Models\\" . $this->selected;
       $edit6 = "/admin/" . $EditString->transformUrl($this->selected);
       $edit7 = "livewire.saphir." . strtolower($this->selected) . ".edit.edit";

       $RouteString = new \Saphir\Saphir\Utils\Generator\TransformString();
       
       $route1 = "/admin/" . $RouteString->transformUrl($this->selected) ;
       $route2 = "/admin/" . $RouteString->transformUrl($this->selected) . "/create" ;
       $route3 = "/admin/" . $RouteString->transformUrl($this->selected) . "/edit/{id}" ;
       $routeSide1 = "App\\Livewire\\Saphir\\" . $this->selected . "\\Liste::class" ;
       $routeSide2 = "App\\Livewire\\Saphir\\" . $this->selected . "\\Create\\Create::class" ;
       $routeSide3 = "App\\Livewire\\Saphir\\" . $this->selected . "\\Edit\\Edit::class" ;
    
       $crud = new  \Saphir\Saphir\Utils\Generator\CrudPart();

       $chemin1 = base_path($tempchemin1);
       $content1 = $crud->getPiece1($namespace1,$liste1,$liste2,
       $liste3,$liste4,$liste5,$liste6) ;
       $chemin2 = base_path($tempchemin2);
       $content2 = $crud->getPiece2($namespace2,$create1,$create2,
       $create3,$create4,$create5,$create6,$create7) ;
       $chemin3 = base_path($tempchemin3);
       $content3 = $crud->getPiece3($namespace3,$edit1,$edit2,
       $edit3,$edit4,$edit5,$edit6,$edit7) ;
       $chemin4 = base_path($tempchemin4);
       $content4 = $crud->getPiece4() ;
       $chemin5 = base_path($tempchemin5);
       $content5 = $crud->getPiece5() ;
       $chemin6 = base_path($tempchemin6); 
       $content6 = $crud->getPiece6() ;

       $tempchemin7 = "routes/Saphir.php" ;
       $chemin7 = base_path($tempchemin7);
       $content7 = $crud->getPiece7($route1,$route2,$route3,
       $routeSide1,$routeSide2,$routeSide3,$this->gardien) ;
      
       if (!File::exists($directory1)) {
        File::makeDirectory($directory1, 0755, true);
    }

    if (!File::exists($directory2)) {
        File::makeDirectory($directory2, 0755, true);
    }

    if (!File::exists($directory3)) {
        File::makeDirectory($directory3, 0755, true);
    }

    if (!File::exists($directory4)) {
        File::makeDirectory($directory4, 0755, true);
    }

    if (!File::exists($directory5)) {
        File::makeDirectory($directory5, 0755, true);
    }

    if (!File::exists($directory6)) {
        File::makeDirectory($directory6, 0755, true);
    }

       File::put($chemin1 , $content1);
       File::put($chemin2 , $content2);
       File::put($chemin3 , $content3);
       File::put($chemin4 , $content4);
       File::put($chemin5 , $content5);
       File::put($chemin6 , $content6);
       File::append($chemin7 , $content7);

       $transformString = new \Saphir\Saphir\Utils\Generator\TransformString();
            $crud = new \Saphir\Saphir\Models\Saphircrud() ;
            $crud->model  =  $this->selected;
            $crud->label  = $transformString->transformLink($this->selected) ;
            $crud->route  = '/admin/' .  $transformString->transformUrl($this->selected) ;
            $crud->icon  = 'description' ;
            $crud->active  = true ;
            $crud->save()  ;

       $this->js("const notyf = new Notyf({ position: {x: 'right',y: 'top'}});
        notyf.success('Crud Created!');"); 

    /*   
        
        $piece5 = $CrudPart->getPiece5();
        $filePath5 = base_path('resources/views/example.blade.php');
        $piece6= $CrudPart->getPiece6();
        $filePath6 = base_path('resources/views/example.blade.php');
       // File::append($filePath5 , $piece5);*/
    }


    public function initModel()
    {

        $path = app_path('Models');

        foreach (File::files($path) as $file) {
            
            $this->listModels[] =  pathinfo($file->getFilename(), PATHINFO_FILENAME);
        }

      
    }


    public function render()
    {
        return view('saphir::livewire.saphir1',
        ['allRoutes' => \Saphir\Saphir\Models\Saphircrud::where('active',true)->get(),
        'user' => \Illuminate\Support\Facades\Auth::user() ,
       ]
        )
               ->layout('saphir::layouts.app');
    }
}