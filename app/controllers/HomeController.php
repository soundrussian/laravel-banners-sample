<?php

class HomeController extends BaseController {

	public function __construct(Acme\Banners\BannersRepositoryInterface $banners)
	{
		$this->banners = $banners;
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}
