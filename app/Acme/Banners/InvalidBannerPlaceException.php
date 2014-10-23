<?php namespace Acme\Banners;

use Config;
use InvalidArgumentException;

class InvalidBannerPlaceException extends InvalidArgumentException
{
    public function __construct($message)
    {
        $available_places = implode(', ', Config::get('banners.available_places'));
        parent::__construct("$message - Неверное место для баннера. Доступные места: $available_places. ");
    }

}