<?php

use Illuminate\Support\Facades\Route;

/*$directory = base_path('routes'); // Specify the directory
$fileName = 'saphir.php'; // Specify the file name

$filePath = $directory . DIRECTORY_SEPARATOR . $fileName;

if (file_exists($filePath)) {
    require_once $filePath;
} */


Route::middleware('web')->group(function () {
   
   $temp = config('saphir.middlewareDev');
    Route::get('/admin/crud-generator',\Saphir\Saphir\Livewire\Saphir1::class)->middleware($temp);
    Route::get('/admin/chart-generator', \Saphir\Saphir\Livewire\Saphir2::class)->middleware($temp);
    Route::get('/admin/wizard-generator', \Saphir\Saphir\Livewire\Saphir3::class)->middleware($temp);
    Route::get('/admin/route-generator', \Saphir\Saphir\Livewire\Saphir4::class)->middleware($temp);
    Route::get('/admin/widget-generator', \Saphir\Saphir\Livewire\Saphir5::class)->middleware($temp);
    Route::get('/admin/route-generator/create', \Saphir\Saphir\Livewire\Saphir6::class)->middleware($temp);
    Route::get('/admin/route-generator/edit/{id}', \Saphir\Saphir\Livewire\Saphir7::class)->middleware($temp);
    Route::get('/admin/login', \Saphir\Saphir\Livewire\Saphir8::class)->middleware('guest');
});
