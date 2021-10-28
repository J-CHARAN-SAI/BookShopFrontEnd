<?php

namespace App\Providers;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\IAuthorRepository;
use App\Repository\IBookRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBookRepository::class, function (){
            return new BookRepository();
        });

        $this->app->bind(IAuthorRepository::class, function (){
            return new AuthorRepository();
        });
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
