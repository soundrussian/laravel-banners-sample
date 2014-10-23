<?php namespace Acme\Banners;

class DbBannersRepository implements BannersRepositoryInterface
{

    public function __construct(BannerPlaces $places)
    {
        $this->places = $places;
    }

    public function bannersFor($place)
    {
        return $this->places->query($place)->orderByRaw('RANDOM()')->get();
    }

}