<?php namespace Acme\Banners\Views;

use Acme\Banners\BannerPlaces;
use Acme\Banners\BannersRepositoryInterface;

class ViewsComposer
{

    public function __construct(BannersRepositoryInterface $banners)
    {
        $this->banners = $banners;
    }

    public function compose($view)
    {
        $place = BannerPlaces::nameFromView($view);
        $view->with('banners', $this->banners->bannersFor($place));
    }
}