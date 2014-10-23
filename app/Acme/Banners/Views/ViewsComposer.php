<?php namespace Acme\Banners\Views;


class ViewsComposer
{

    public function __construct(\Acme\Banners\BannersRepositoryInterface $banners)
    {
        $this->banners = $banners;
    }

    public function compose($view)
    {
        $parts = explode('.', $view->getName());
        $place = end($parts);
        $view->with('banners', $this->banners->bannersFor($place));
    }
}