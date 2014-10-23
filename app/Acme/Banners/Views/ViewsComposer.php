<?php namespace Acme\Banners\Views;

use Acme\Banners\BannerPlaces;
use Acme\Banners\BannersRepositoryInterface;

class ViewsComposer
{

    public function __construct(BannersRepositoryInterface $banners,
                                BannerPlaces $places)
    {
        $this->banners = $banners;
        $this->places  = $places;
    }

    public function compose($view)
    {
        $place = $this->places->nameFromView($view);
        $view->with('banners', $this->banners->bannersFor($place));
    }
}