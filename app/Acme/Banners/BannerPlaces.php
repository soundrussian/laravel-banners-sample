<?php namespace Acme\Banners;

use Banner;
use Config;
use Illuminate\Database\Eloquent\Collection;

class BannerPlaces
{
    protected $place;

    public function __construct($place = null)
    {
        $this->place = $place;
    }

    public function setPlace($place)
    {
        if(!in_array($place, Config::get('banners.available_places')))
            throw new InvalidBannerPlaceException($place);
        $this->place = $place;
        return $this;
    }

    public static function viewsNames()
    {
        $available_views = Config::get('banners.available_places');
        $folder = Config::get('banners.views_folder');
        $views = array_map(function($view) use ($folder) { return "$folder.$view"; }, $available_views);
        return $views;
    }

    public static function nameFromView($view)
    {
        $parts = explode('.', $view->getName());
        $place = end($parts);
        return $place;
    }

    public function query()
    {
        $limit = $this->limit($this->place);
        return Banner::where('banner_place', $this->place)->limit($limit);
    }

    public function fillGaps(Collection &$banners)
    {
        $missing = $this->limit($this->place) - $banners->count();
        for($i = 0; $i < $missing; $i++)
            $banners->add($this->emptyBanner($this->place));
    }

    public function emptyBanner()
    {
        $banner = new Banner;
        $banner->url = '/';
        $dimensions = $this->dimensions($this->place);
        $dimensions_string = $dimensions->width.'x'.$dimensions->height;
        $banner->content = '<img src="http://placehold.it/'.$dimensions_string.'/DDDDDD/FFFEFE&text=Your+ad+here!"/>';
        return $banner;
    }

    public function dimensions()
    {
        $dimension = new \stdClass;
        $dimension->width = Config::get("banners.places.$this->place.width");
        $dimension->height = Config::get("banners.places.$this->place.height");
        return $dimension;
    }

    public function limit()
    {
        return Config::get("banners.places.$this->place.placeholders");
    }
}