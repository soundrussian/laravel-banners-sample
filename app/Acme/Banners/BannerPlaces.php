<?php namespace Acme\Banners;

use Banner;
use Config;
use Illuminate\Database\Eloquent\Collection;

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
        $limit = $this->limit($place);
        return Banner::where('banner_place', $place)->limit($limit);
    }

    public function fillGaps($place, Collection &$banners)
    {
        $missing = $this->limit($place) - $banners->count();
        for($i = 0; $i < $missing; $i++)
            $banners->add($this->emptyBanner($place));
    }

    public function emptyBanner($place)
    {
        $banner = new Banner;
        $banner->url = '/';
        $dimensions = $this->dimensions($place);
        $dimenstions_string = $dimensions->width.'x'.$dimensions->height;
        $banner->content = '<img src="http://placehold.it/'.$dimenstions_string.'/DDDDDD/FFFEFE&text=Your+ad+here!"/>';
        return $banner;
    }

    public function dimensions($place)
    {
        $dimension = new \stdClass;
        $dimension->width = Config::get("banners.places.$place.width");
        $dimension->height = Config::get("banners.places.$place.height");
        return $dimension;
    }

    public function limit($place)
    {
        return Config::get("banners.places.$place.placeholders");
    }

    public function validatePlace($place)
    {
        if(!in_array($place, Config::get('banners.available_places')))
            throw new InvalidBannerPlaceException($place);
    }
}