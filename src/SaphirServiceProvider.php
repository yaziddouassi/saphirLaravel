<?php

namespace Saphir\Saphir;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class SaphirServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/saphir.php', 'saphir'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','saphir');

        $this->publishes([
            __DIR__.'/../config/saphir.php' => config_path('saphir.php'),
        ], 'config');

        $this->commands([
            \Saphir\Saphir\Commands\SaphirCommand::class,
        ]);
   

        Livewire::component('saphir1', \Saphir\Saphir\Livewire\Saphir1::class);
        Livewire::component('saphir2', \Saphir\Saphir\Livewire\Saphir2::class);
        Livewire::component('saphir3', \Saphir\Saphir\Livewire\Saphir3::class);
        Livewire::component('saphir4', \Saphir\Saphir\Livewire\Saphir4::class);
        Livewire::component('saphir5', \Saphir\Saphir\Livewire\Saphir5::class);
        Livewire::component('saphir6', \Saphir\Saphir\Livewire\Saphir6::class);
        Livewire::component('saphir7', \Saphir\Saphir\Livewire\Saphir7::class);
        Livewire::component('saphir8', \Saphir\Saphir\Livewire\Saphir8::class);
        Livewire::component('saphir.sidebar', \Saphir\Saphir\Livewire\Sidebar::class);
        Livewire::component('saphir.navbar', \Saphir\Saphir\Livewire\Navbar::class);
        Livewire::component('saphir.chartexample', \Saphir\Saphir\Livewire\Chartexample::class);
        Livewire::component('saphir.chartexample2', \Saphir\Saphir\Livewire\Chartexample2::class);
        Livewire::component('saphir.chartexample3', \Saphir\Saphir\Livewire\Chartexample3::class);
        Livewire::component('saphir.widget', \Saphir\Saphir\Livewire\Widget::class);
        Livewire::component('saphir.saphircreator', \Saphir\Saphir\Livewire\SaphirCreator::class);
        Livewire::component('saphir.saphirupdate', \Saphir\Saphir\Livewire\SaphirUpdate::class);
        Livewire::component('saphir.wizardcreator', \Saphir\Saphir\Livewire\WizardCreator::class);
        Livewire::component('saphir.wizardupdate', \Saphir\Saphir\Livewire\WizardUpdate::class);
        Livewire::component('saphir.listing', \Saphir\Saphir\Livewire\Listing::class);

        Blade::component('saphir::components.saphirModal', 'saphir-modal');
        Blade::component('saphir::components.saphirAllButtons', 'saphir-all-btn');
       
        
    }
}
