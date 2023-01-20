<?php

namespace App\Providers;

use App\Repository\Contracts\IIbge;
use App\Repository\Ibge;
use Illuminate\Support\ServiceProvider;

class IbgeProvider extends ServiceProvider
{
    public array $bindings = [
        IIbge::class => Ibge::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if(config('app.api_externa') == 'brasilapi') {
            $this->app->bind(
                'App\Services\Contracts\IPesquisaExterna',
                'App\Services\BrasilApi'
            );
        } else {
            $this->app->bind(
                'App\Services\Contracts\IPesquisaExterna',
                'App\Services\IbgeApi'
            );
        }
        

        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
