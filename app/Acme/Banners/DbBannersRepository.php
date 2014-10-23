<?php namespace Acme\Banners;

use \Banner;

class DbBannersRepository implements BannersRepositoryInterface
{

    public function bannersFor($place)
    {
        if ($place == 'top')
        {
            return Banner::where('banner_place', 'top')->limit(2)->orderByRaw('RANDOM()')->get();
        } else {
            return Banner::where('banner_place', 'bottom')->limit(3)->orderByRaw('RANDOM()')->get();
        }
    }

}