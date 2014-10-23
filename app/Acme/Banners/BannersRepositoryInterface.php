<?php namespace Acme\Banners;

interface BannersRepositoryInterface
{

    public function bannersFor($place);

}