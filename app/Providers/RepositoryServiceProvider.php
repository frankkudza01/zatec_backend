<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\User\UserRegisterInterface',
            'App\Repositories\User\UserRegisterRepository'
        );

        $this->app->bind(
            'App\Interfaces\User\UserLoginInterface',
            'App\Repositories\User\UserLoginRepository'
        );

        $this->app->bind(
            'App\Interfaces\User\UserLogoutInterface',
            'App\Repositories\User\UserLogoutRepository'
        );

        $this->app->bind(
            'App\Interfaces\Albums\AlbumsInterface',
            'App\Repositories\Albums\AlbumsRepository'
        );

        $this->app->bind(
            'App\Interfaces\Genres\GenreInterface',
            'App\Repositories\Genres\GenreRepository'
        );

        $this->app->bind(
            'App\Interfaces\Songs\SongsInterface',
            'App\Repositories\Songs\SongsRepository'
        );
    }
}
