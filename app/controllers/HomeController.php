<?php

class HomeController extends BaseController {

	public function __construct(Acme\Banners\BannersRepositoryInterface $banners)
	{
		$this->banners = $banners;
	}

	public function showWelcome()
	{
    	$banners = $this->banners->bannersFor('top');
    	$bottom_banners = $this->banners->bannersFor('bottom');
		return View::make('hello', compact('banners', 'bottom_banners'));
	}

}
