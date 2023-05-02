<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\PermissionTranslate;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => "discover_algeria_about",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Discover Algeria",
                        'value'     => "About Algeria"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "اكتشف الجزائر",
                        'value'     => "عن الجزائر"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Decouvrir L'Algerie",
                        'value'     => "A propos de l’Algérie"
                    ]
                ]
            ],
            [
                'name' => "discover_algeria_why_investing",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Discover Algeria",
                        'value'     => "Why investing in Algeria"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "اكتشف الجزائر",
                        'value'     => "لماذا الاستثمار في الجزائر"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Decouvrir L'Algerie",
                        'value'     => "Pourquuoi investir en Algérie"
                    ]
                ]
            ],
            [
                'name' => "discover_algeria_growth_markets",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Discover Algeria",
                        'value'     => "Growth markets"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "اكتشف الجزائر",
                        'value'     => "أسواق النمو"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Decouvrir L'Algerie",
                        'value'     => "Marchés de croissance"
                    ]
                ]
            ],
            [
                'name' => "discover_algeria_basic_infrastructure",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Discover Algeria",
                        'value'     => "Basic infrastructure"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "اكتشف الجزائر",
                        'value'     => "المؤشرات الاقتصادية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Decouvrir L'Algerie",
                        'value'     => " Infrastructures de base"
                    ]
                ]
            ],
            [
                'name' => "discover_algeria_living",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Discover Algeria",
                        'value'     => "Living in Algeria"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "اكتشف الجزائر",
                        'value'     => "تعيش الجزائر"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Decouvrir L'Algerie",
                        'value'     => "Vivre en Algérie"
                    ]
                ]
            ],
        
            [
                'name' => "business_environment_expert_advice",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Environment",
                        'value'     => "Expert Advice"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "مصادر",
                        'value'     => "نصيحة إختصاصية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Environnement d'Affaires",
                        'value'     => "Avis d’experts"
                    ]
                ]
            ],
            [
                'name' => "business_environment_invest_in_algeria",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Environment",
                        'value'     => "Invest in Algeria"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "مصادر",
                        'value'     => "استثمر في الجزائر"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Environnement d'Affaires",
                        'value'     => "Investir en Algérie"
                    ]
                ]
            ],
            [
                'name' => "business_environment_legal_framework",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Environment",
                        'value'     => "Legal framework"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "مصادر",
                        'value'     => "الإطار القانوني والتشريعي"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Environnement d'Affaires",
                        'value'     => "Cadre légal "
                    ]
                ]
            ],
            [
                'name' => "business_environment_organizations_dedicated_to_investment",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Environment",
                        'value'     => "Organizations dedicated to investment"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "مصادر",
                        'value'     => "البنى التحتية المخصصة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Environnement d'Affaires",
                        'value'     => "Organismes dédiés à l‘investissement "
                    ]
                ]
            ],
            [
                'name' => "business_environment_useful_contact",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Environment",
                        'value'     => "Useful contact"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "مصادر",
                        'value'     => "المنظمات والمؤسسات"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Environnement d'Affaires",
                        'value'     => "Contacts utiles"
                    ]
                ]
            ],
            [
                'name' => "news_business_economy_news",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "News",
                        'value'     => "Business & Economy news"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "أخبار",
                        'value'     => "أخبار الأعمال والاقتصاد"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Actualite Economique",
                        'value'     => "Actualité économique"
                    ]
                ]
            ],
            [
                'name' => "news_economic_news_newsletter",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "News",
                        'value'     => "Economic news newsletter"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "أخبار",
                        'value'     => "النشرة الإخبارية الاقتصادية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Actualite Economique",
                        'value'     => "Newsletter économique"
                    ]
                ]
            ],
            [
                'name' => "news_premium_news",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "News",
                        'value'     => "Premium news"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "أخبار",
                        'value'     => "أخبار مميزة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Actualite Economique",
                        'value'     => "Actualités premium"
                    ]
                ]
            ],
            [
                'name' => "news_press_review",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "News",
                        'value'     => "Press review"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "أخبار",
                        'value'     => "مراجعة الصحافة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Actualite Economique",
                        'value'     => "Revue de presse"
                    ]
                ]
            ],
            [
                'name' => "events_notification_of_events",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Events",
                        'value'     => "Notifications of events"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "الأحداث",
                        'value'     => "الإخطار بالأحداث"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Événements",
                        'value'     => "Notifications d'événements"
                    ]
                ]
            ],
            [
                'name' => "events_calendar_of_upcoming_events",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Events",
                        'value'     => "Calendar of upcoming events"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "الأحداث",
                        'value'     => "تقويم الأحداث القادمة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Événements",
                        'value'     => "Agenda des évènements à venir"
                    ]
                ]
            ],
            [
                'name' => "events_past_events_report",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Events",
                        'value'     => "Past events report"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "الأحداث",
                        'value'     => "تقرير الأحداث الماضية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Événements",
                        'value'     => " Rapport d’évènements "
                    ]
                ]
            ],
            [
                'name' => "events_b2b_meeting",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Events",
                        'value'     => "B2B meeting"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "الأحداث",
                        'value'     => "اجتماع B2B"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Événements",
                        'value'     => "Rencontre B2B"
                    ]
                ]
            ],
            [
                'name' => "business_directory_company_profile",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Directory",
                        'value'     => "Company Profile"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "دليل الأعمال",
                        'value'     => "ملف الشركة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Annuaire des entreprises",
                        'value'     => "Profil de la société"
                    ]
                ]
            ],
            [
                'name' => "business_opportunities_business_opportunities",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Opportunities",
                        'value'     => "Business Opportunities"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "فرص عمل",
                        'value'     => "فرص عمل"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Opportunités d’affaires ",
                        'value'     => "Opportunités d’affaires "
                    ]
                ]
            ],
            [
                'name' => "business_opportunities_opportunity_newsletter",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Opportunities",
                        'value'     => "Business Opportunities Newsletter"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "فرص عمل",
                        'value'     => "فرصة النشرة الإخبارية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "Opportunités d’affaires ",
                        'value'     => "Notifications de nouvelles opportunités d'affaires"
                    ]
                ]
            ],
           
            [
                'name' => "business_intelligence_notification_of_new_reports",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Intelligence",
                        'value'     => "Notification of new reports"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "ذكاء الأعمال",
                        'value'     => "الإخطار بالتقارير الجديدة"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "L'intelligence d'entreprise",
                        'value'     => "Notification de nouveaux rapports"
                    ]
                ]
            ],
            [
                'name' => "business_intelligence_sectors_analysis_reports",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Intelligence",
                        'value'     => "Sectors analysis reports"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "ذكاء الأعمال",
                        'value'     => ""
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "L'intelligence d'entreprise",
                        'value'     => ""
                    ]
                ]
            ],
            [
                'name' => "business_intelligence_event_monitoring",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Intelligence",
                        'value'     => "Event monitoring"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "ذكاء الأعمال",
                        'value'     => "مراقبة الحدث"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "L'intelligence d'entreprise",
                        'value'     => "surveillance des événements"
                    ]
                ]
            ],
            [
                'name' => "business_intelligence_competitive_intelligence",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Intelligence",
                        'value'     => "Competitive intelligence"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "ذكاء الأعمال",
                        'value'     => "ذكاء تنافسي"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "L'intelligence d'entreprise",
                        'value'     => "veille concurrentielle"
                    ]
                ]
            ],
            [
                'name' => "business_intelligence_legal_monitoring",
                'permission_translates' => [
                    [
                        'locale'    => 'en',
                        'module'    => "Business Intelligence",
                        'value'     => "Legal monitoring"
                    ],
                    [
                        'locale'    => 'ar',
                        'module'    => "ذكاء الأعمال",
                        'value'     => "المراقبة القانونية"
                    ],
                    [
                        'locale'    => 'fr',
                        'module'    => "L'intelligence d'entreprise",
                        'value'     => "surveillance juridique"
                    ]
                ]
            ]
        ];

        foreach ($permissions as $permission)
        {
            $permission['created_by'] = 1;
            $permission['updated_by'] = 1;

            $data = $permission;
            $translate = $data['permission_translates'];
            unset($data['permission_translates']);
            $result = Permission::create($data);

            $translate[0]['permission_id'] = $result->id;
            $translate[1]['permission_id'] = $result->id;
            $translate[2]['permission_id'] = $result->id;
            $result = PermissionTranslate::insert($translate);
        }
    }
}
