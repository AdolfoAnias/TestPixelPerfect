<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client; 
use Illuminate\Support\Facades\Config;
use App\Adapters\APIAdapters\WebAPI;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WebAPI', 'App\Adapters\APIAdapters\WebAPI');
    	$this->app->bind('App\Adapters\APIAdapters\WebAPI', function() {
            $client = new Client([
                'base_uri' => Config::get('app.address'),
                'timeout' => 7200,
                ]);
            return (new WebAPI($client));               
        });

        $this->app->bind('App\Contracts\IEmployRepository', 'App\Repositories\EmployRepository');
        $this->app->bind('App\Contracts\ICompaniesRepository', 'App\Repositories\CompaniesRepository');
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
