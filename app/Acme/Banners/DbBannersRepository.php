<?php namespace Acme\Banners;

use Banner;
use Config;

class DbBannersRepository implements BannersRepositoryInterface
{

    public function bannersFor($place)
    {
        if(!in_array($place, Config::get('banners.available_places')))
            throw new InvalidBannerPlaceException($place);
        $limit = Config::get("banners.places.$place.placeholders");
        return Banner::where('banner_place', $place)->limit($limit)->orderByRaw('RANDOM()')->get();
    }

}