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
        $this->places->setPlace($place);
        $this->banners = $this->places->query()->get();
        $this->increaseViews();
        $this->places->fillGaps($this->banners);
        return $this->banners->shuffle();
    }

    private function increaseViews()
    {
        $ids = $this->banners->lists('id');
        if(count($ids)) Banner::whereIn('id', $ids)->increment('views');
    }

}