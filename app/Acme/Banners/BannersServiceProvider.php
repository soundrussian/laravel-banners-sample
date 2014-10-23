<?php namespace Acme\Banners;

use Config;
use Illuminate\Support\ServiceProvider;
use View;

class BannersServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('Acme\Banners\BannersRepositoryInterface', 'Acme\Banners\DbBannersRepository');
        View::composers(array(
            'Acme\Banners\Views\ViewsComposer' => $this->bannerViewsNames()
        ));
    }

    private function bannerViewsNames()
    {
        $available_views = Config::get('banners.available_places');
        $folder = Config::get('banners.views_folder');
        $views = array_map(function($view) use ($folder) { return "$folder.$view"; }, $available_views);
        return $views;
    }

}