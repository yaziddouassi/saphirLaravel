<?php

namespace  Saphir\Saphir\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SaphirCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'saphir:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saphir Installation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $installor = new \Saphir\Saphir\Utils\Generator\InstallatorPart();
        $filePathRouter = base_path('routes/web.php');

        
        if (!File::exists("app/Livewire/Saphir")) {
            File::makeDirectory("app/Livewire/Saphir", 0755, true);
        }

        if (!File::exists("resources/views/livewire/saphir")) {
            File::makeDirectory("resources/views/livewire/saphir", 0755, true);
        }


        $piece1 = $installor->getPiece1();
        $filePath1 = base_path('app/Livewire/Saphir/Admin.php');

        $piece2 = $installor->getPiece2();
        $filePath2 = base_path('resources/views/livewire/saphir/admin.blade.php');

        $piece3 = $installor->getPiece3();
        $filePath3 = base_path('routes/saphir.php');
        
        File::append($filePath1 , $piece1);
        File::append($filePath2 , $piece2);
        File::append($filePath3 , $piece3);
        File::append($filePathRouter ,"require __DIR__.'/saphir.php';" );

        $this->info("Package installed");
    }
}
