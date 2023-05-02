<?php

use App\Models\Permission;
use App\Models\Subscription;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionTranslate;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'created_by'=>1,
                'updated_by'=>1,
                'duration'=>1,
                'no_of_users'=>0,
                'price_dollar'=>0.00,
                'price_dzd'=>0.00,
                'price_euro'=>0.00,
                'status'=>1,
                'permissions' => [
                    'discover_algeria_about',
                    'discover_algeria_why_investing',
                    'discover_algeria_growth_markets',
                    'discover_algeria_basic_infrastructure',
                    'discover_algeria_living',

                    'business_environment_expert_advice',
                    'business_environment_invest_in_algeria',
                    'business_environment_legal_framework',
                    'business_environment_organizations_dedicated_to_investment',
                    'business_environment_useful_contact',
                   
                    'news_business_economy_news',
                    'news_economic_news_newsletter',

                    'events_notification_of_events',
                    'events_calendar_of_upcoming_events'
                ],
                'subscription_translates' => [
                    [
                        'locale'=>'en',
                        'name'=>'Free',
                        'description' => '<p>You will get few features in this plan.</p>'
                    ],
                    [
                        'locale'=>'ar',
                        'name'=>'مجانا',
                        'description' => '<p>ستحصل على عدد قليل من الميزات في هذه الخطة.</p>'
                    ],
                    [
                        'locale'=>'fr',
                        'name'=>'Libre',
                        'description' => '<p>Vous obtiendrez quelques fonctionnalités dans ce plan.</p>'
                    ]
                ],
            ],
            [
                'created_by'=>1,
                'updated_by'=>1,
                'duration'=>1,
                'no_of_users'=>3,
                'price_dollar'=>30000.00,
                'price_dzd'=>30000.00,
                'price_euro'=>30000.00,
                'status'=>1,
                'permissions' => [
                    'discover_algeria_about',
                    'discover_algeria_why_investing',
                    'discover_algeria_growth_markets',
                    'discover_algeria_basic_infrastructure',
                    'discover_algeria_living',

                    'business_environment_expert_advice',
                    'business_environment_invest_in_algeria',
                    'business_environment_legal_framework',
                    'business_environment_organizations_dedicated_to_investment',
                    'business_environment_useful_contact',

                    'news_business_economy_news',
                    'news_economic_news_newsletter',
                    'news_premium_news',

                    'events_notification_of_events',
                    'events_calendar_of_upcoming_events',
                    'events_past_events_report',
                    'events_b2b_meeting',

                    'business_directory_company_profile'
                ],
                'subscription_translates' => [
                    [
                        'locale'=>'en',
                        'name'=>'Basic',
                        'description' => '<p>You have more permission than free account.</p>'
                    ],
                    [
                        'locale'=>'ar',
                        'name'=>'الأساسي',
                        'description' => '<p>لديك إذن أكثر من الحساب المجاني.</p>'
                    ],
                    [
                        'locale'=>'fr',
                        'name'=>'De base',
                        'description' => '<p>Vous avez plus d\'autorisation qu\'un compte gratuit.</p>'
                    ]
                ],
            ],
            [
                'created_by'=>1,
                'updated_by'=>1,
                'duration'=>1,
                'no_of_users'=>6,
                'price_dollar'=>70000.00,
                'price_dzd'=>70000.00,
                'price_euro'=>70000.00,
                'status'=>1,
                'permissions' => [
                    'discover_algeria_about',
                    'discover_algeria_why_investing',
                    'discover_algeria_growth_markets',
                    'discover_algeria_basic_infrastructure',
                    'discover_algeria_living',

                    'business_environment_expert_advice',
                    'business_environment_invest_in_algeria',
                    'business_environment_legal_framework',
                    'business_environment_organizations_dedicated_to_investment',
                    'business_environment_useful_contact',

                    'news_business_economy_news',
                    'news_economic_news_newsletter',
                    'news_premium_news',

                    'events_notification_of_events',
                    'events_calendar_of_upcoming_events',
                    'events_past_events_report',
                    'events_b2b_meeting',

                    'business_directory_company_profile',

                    'business_opportunities_business_opportunities',
                    'business_opportunities_opportunity_newsletter',

                    'business_intelligence_notification_of_new_reports',
                    'business_intelligence_sectors_analysis_reports'
                ],
                'subscription_translates' => [
                    [
                        'locale'=>'en',
                        'name'=>'Advanced',
                        'description' => '<p>You have more permission than Basic Account.</p>'
                    ],
                    [
                        'locale'=>'ar',
                        'name'=>'المتقدمة',
                        'description' => '<p>لديك إذن أكثر من الحساب الأساسي.</p>'
                    ],
                    [
                        'locale'=>'fr',
                        'name'=>'Avancé',
                        'description' => '<p>Vous avez plus d\'autorisations que le compte de base.</p>'
                    ]
                ],
            ],
            [
                'created_by'=>1,
                'updated_by'=>1,
                'duration'=>1,
                'no_of_users'=>10,
                'price_dollar'=>300,
                'price_dzd'=>400000.00,
                'price_euro'=>250,
                'status'=>1,
                'permissions' => [
                    'discover_algeria_about',
                    'discover_algeria_why_investing',
                    'discover_algeria_growth_markets',
                    'discover_algeria_basic_infrastructure',
                    'discover_algeria_living',

                    'business_environment_expert_advice',
                    'business_environment_invest_in_algeria',
                    'business_environment_legal_framework',
                    'business_environment_organizations_dedicated_to_investment',
                    'business_environment_useful_contact',

                    'news_business_economy_news',
                    'news_economic_news_newsletter',
                    'news_premium_news',
                    'news_press_review',

                    'events_notification_of_events',
                    'events_calendar_of_upcoming_events',
                    'events_past_events_report',
                    'events_b2b_meeting',

                    'business_directory_company_profile',

                    'business_opportunities_business_opportunities',
                    'business_opportunities_opportunity_newsletter',

                    'business_intelligence_notification_of_new_reports',
                    'business_intelligence_sectors_analysis_reports',
                    'business_intelligence_event_monitoring',
                    'business_intelligence_competitive_intelligence',
                    'business_intelligence_legal_monitoring'
                ],
                'subscription_translates' => [
                    [
                        'locale'=>'en',
                        'name'=>'Paid Subscription',
                        'description' => '<p>You have more permission than Advanced Account.</p>'
                    ],
                    [
                        'locale'=>'ar',
                        'name'=>'اشتراك مدفوع',
                        'description' => '<p>لديك إذن أكثر من الحساب الأساسي.</p>'
                    ],
                    [
                        'locale'=>'fr',
                        'name'=>'Abonnement Payant',
                        'description' => '<p>Vous avez plus d\'autorisations que le compte de base.</p>'
                    ]
                ],
            ],
        ];

        foreach ($subscriptions as $subscription)
        {

            $data = $subscription;
            $permissions = $data['permissions'];
            $translates = $data['subscription_translates'];
            unset($data['subscription_translates'], $data['permissions']);
            $subscription_result = Subscription::create($data);

            $translates[0]['subscription_id'] = $subscription_result->id;
            $translates[1]['subscription_id'] = $subscription_result->id;
            $translates[2]['subscription_id'] = $subscription_result->id;
            SubscriptionTranslate::insert($translates);

            $permissionIds = Permission::whereIn('name', $permissions)->pluck('id');
            $subscription_result->permissions()->sync($permissionIds);
        }
    }
}
