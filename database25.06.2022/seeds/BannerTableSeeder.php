<?php

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$banners = [
            [
                'name' => 'Home Banner',
                'key' => 'home',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'About Us Banner',
                'key' => 'about_us',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Discover Algeria',
                'key' => 'discover_algeria',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Algeria Invest Business Network',
                'key' => 'algeria_business_network',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Faq',
                'key' => 'faq',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'News',
                'key' => 'news',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Event',
                'key' => 'events',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Upcoming Events',
                'key' => 'upcoming_events',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Event Details',
                'key' => 'event_detail',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Past Events',
                'key' => 'past_events',
                'created_by' => 1,
                'updated_by' => 1
            ]
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
        
    }
}
