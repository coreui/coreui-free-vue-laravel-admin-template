<?php
namespace App\Repositories\FoldersAndFiles;

use Illuminate\Support\ServiceProvider;

class FoldersAndFilesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\FoldersAndFiles\FoldersAndFilesInterface', 'App\Repositories\FoldersAndFiles\FoldersAndFilesRepository');
    }
}