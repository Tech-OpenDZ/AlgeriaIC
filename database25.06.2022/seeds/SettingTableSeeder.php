<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\SettingTranslate;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            /*[ 
                'created_by'=>1,
                'updated_by'=>1,
                'category'=>"social_media",
                'key'=>"google_url",
                'title'=>"google URL",
                'value_type'=>"string",
                'value'=>null,
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"google.com/en"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"google.com/ar"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"google.com/fr"
                    ]
                ],
            ],*/
            [ 
                'category'=>"social_media",
                'key'=>"facebook_url",
                'title'=>"Facebook URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0,
            ],
            [ 
                'category'=>"social_media",
                'key'=>"facebook_messanger",
                'title'=>"facebook Messanger",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"social_media",
                'key'=>"instagram_url",
                'title'=>"Instagram URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"social_media",
                'key'=>"linkedin_url",
                'title'=>"Linkedin URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"social_media",
                'key'=>"youtube_url",
                'title'=>"Youtube URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"social_media",
                'key'=>"twitter_url",
                'title'=>"Twitter URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"social_media",
                'key'=>"google_url",
                'title'=>"Google URL",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"address_title_main",
                'title'=>"Address title main",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"i2B Corporate Office"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"i2B Corporate Office"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"i2B Corporate Office"
                    ]
                ], 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"address_main",
                'title'=>"Address main",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ]
                ], 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"telephone_main",
                'title'=>"Telephone main",
                'value'=>"93873839393",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"email_main",
                'title'=>"Email main",
                'value'=>"abcdef@gmail.com",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"lang_long_main",
                'title'=>"lang long main",
                'value'=>"10.99222,71.9999",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"address_title_secondary",
                'title'=>"Address title secondary",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"Other company"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"Other company"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"Other company"
                    ]
                ], 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"address_secondary",
                'title'=>"Address secondary",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod"
                    ]
                ], 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"telephone_secondary",
                'title'=>"Telephone secondary",
                'value'=>"93873839393",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"email_secondary",
                'title'=>"Email Secondary",
                'value'=>"abcdef@gmail.com",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"lang_long_secondary",
                'title'=>"lang long secondary",
                'value'=>"10.99222,71.9999",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [ 
                'category'=>"general",
                'key'=>"contact_no",
                'title'=>"Contact NO",
                'value'=>"+213(0)23786347",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],

            [ 
                'category'=>"general",
                'key'=>"opening_time",
                'title'=>"Opening Time",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"Sunday to Thursday from 9h - 17h."
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"من الأحد إلى الخميس من الساعة 9 صباحًا حتى الساعة 17 مساءً."
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"Du dimanche au jeudi de 9h à 17h."
                    ]
                ], 
            ], 
            [ 
                'category'=>"general",
                'key'=>"copyright",
                'title'=>"Copyright",
                'value'=>null,
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>1,
                'setting_traslate' => [
                    [ 
                        'locale'=>'en',
                        'value'=>"ISO9001, ISO 14001 and OHSAS 18001 certified Algeria invest © 2020"
                    ],
                    [ 
                        'locale'=>'ar',
                        'value'=>"شهادات ISO9001 و ISO 14001 و OHSAS 18001 Algeria Invest © 2020"
                    ],
                    [ 
                        'locale'=>'fr',
                        'value'=>"Certifié ISO9001, ISO 14001 et OHSAS 18001 Algérie invest © 2020"
                    ]
                ], 
            ],
            [
                'category' => "social_media",
                'key' => "facebook_app_id",
                'title' => "Facebook App ID",
                'value' => null,
                'created_by' => null,
                'updated_by' => null,
                'value_type' => "string",
                'status' => 1,
                'is_locale' => 0,
            ],
            [ 
                'category'=>"contact_details",
                'key'=>"fax",
                'title'=>"Fax",
                'value'=>"+213 (0)23 786 349",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            [
                'category' => "social_media",
                'key' => "rss_feed",
                'title' => "Rss Feed",
                'value' => null,
                'created_by' => null,
                'updated_by' => null,
                'value_type' => "string",
                'status' => 1,
                'is_locale' => 0,
            ],
            [ 
                'category'=>"general",
                'key'=>"want_to_show_testimonials_on_home_page",
                'title'=>"Want to show Testimonials on Home page? ",
                'value'=>"NA",
                'created_by'=>null,
                'updated_by'=>null,
                'value_type'=>"string",
                'status'=>1,
                'is_locale'=>0, 
            ],
            
        ];

        //Setting::insert($setting);
        foreach ($settings as $setting) 
        {
            if ($setting['is_locale'] == 1) {

                $data = $setting;
                unset($data['setting_traslate']);
                $setting_result = Setting::create($data);
                
                    $setting['setting_traslate'][0]['setting_id'] = $setting_result->id;
                    $setting['setting_traslate'][1]['setting_id'] = $setting_result->id;
                    $setting['setting_traslate'][2]['setting_id'] = $setting_result->id;
                    foreach ($setting['setting_traslate'] as $key => $data) {
                        SettingTranslate::create($data);
                    }
                    
            }else{
                Setting::create($setting);
            }
        }
    }
}
