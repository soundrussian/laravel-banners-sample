<?php namespace Acme\Banners;

use Illuminate\Support\ServiceProvider;
use View;

class BannersServiceProvider extends ServiceProvider
{

    public function register()
    {
        $places = new BannerPlaces;
        $this->app->bind('Acme\Banners\BannersRepositoryInterface', 'Acme\Banners\DbBannersRepository');
        View::composers(array(
            'Acme\Banners\Views\ViewsComposer' => $places->viewsNames()
        ));
    }

}