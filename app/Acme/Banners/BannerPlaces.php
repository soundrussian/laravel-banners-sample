<?php namespace Acme\Banners;

use Banner;
use Config;

class BannerPlaces
{
    public function viewsNames()
    {
        $available_views = Config::get('banners.available_places');
        $folder = Config::get('banners.views_folder');
        $views = array_map(function($view) use ($folder) { return "$folder.$view"; }, $available_views);
        return $views;
    }

    public function nameFromView($view)
    {
        $parts = explode('.', $view->getName());
        $place = end($parts);
        self::validatePlace($place);
        return $place;
    }

    public function query($place)
    {
        self::validatePlace($place);
        $limit = Config::get("banners.places.$place.placeholders");
        return Banner::where('banner_place', $place)->limit($limit);
    }

    public function validatePlace($place)
    {
        if(!in_array($place, Config::get('banners.available_places')))
            throw new InvalidBannerPlaceException($place);
    }
}