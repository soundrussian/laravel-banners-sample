<?php

class BannersSeeder extends Seeder
{

    public function run()
    {
        DB::table('banners')->truncate();

        Banner::create([
            'url' => 'http://laravel.com',
            'content' => '<img src="http://placehold.it/480x150/F26F6D/FFFEFE&text=Laravel"/>',
            'banner_place' => 'top'
        ]);

        Banner::create([
            'url' => 'http://laracasts.com',
            'content' => '<img src="http://placehold.it/480x150/82B4AB/FFFEFE&text=Laracasts"/>',
            'banner_place' => 'top'
        ]);

        Banner::create([
            'url' => 'http://larajobs.com',
            'content' => '<img src="http://placehold.it/480x150/34495E/FFFFFF&text=Larajobs"/>',
            'banner_place' => 'top'
        ]);

        Banner::create([
            'url' => 'http://larajobs.com',
            'content' => '<img src="http://placehold.it/480x150/E74C3C/FFFFFF&text=Taylor+Otwell"/>',
            'banner_place' => 'top'
        ]);

        Banner::create([
            'url' => 'http://habrahabr.ru',
            'content' => '<img src="http://placehold.it/320x70/9CC2CE/FFFFFF&text=Habrahabr"/>',
            'banner_place' => 'bottom'
        ]);

        Banner::create([
            'url' => 'https://vk.com/laravel_rus',
            'content' => '<img src="http://placehold.it/320x70/527397/FFFFFF&text=laravel_rus"/>',
            'banner_place' => 'bottom'
        ]);
    }

}