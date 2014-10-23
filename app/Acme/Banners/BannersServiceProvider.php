<?php namespace Acme\Banners;

use Illuminate\Support\ServiceProvider;

class BannersServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('Acme\Banners\BannersRepositoryInterface', 'Acme\Banners\DbBannersRepository');
    }

}