<?php namespace Acme\Banners;

use Banner;

class DbBannersRepository implements BannersRepositoryInterface
{

    protected $banners;

    public function __construct(BannerPlaces $places)
    {
        $this->places = $places;
    }

    public function bannersFor($place)
    {
        $this->banners = $this->places->query($place)->orderByRaw('RANDOM()')->get();
        $this->increaseViews();
        return $this->banners;
    }

    private function increaseViews()
    {
        $ids = $this->banners->lists('id');
        if(count($ids)) Banner::whereIn('id', $ids)->increment('views');
    }

}