<?php

use Illuminate\Database\Seeder;
use App\Models\DiscoverAlgeriaContent,
    App\Models\DiscoverAlgeriaContentTranslate,
    App\Models\DiscoverAlgeriaSubcontent,
    App\Models\DiscoverAlgeriaSubcontentTranslate;

class DiscoverAlgeriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discover_algeria_contents =
        [
            [ 
                'created_by'            =>1,
                'updated_by'            =>1,
                'content_key'           =>'about_algeria',
                'status'                =>1,
                'display_order'         =>1,
                'discover_algeria_content_translates' => 
                [
                    [
                        'locale'=>"en",
                        'title'=>"About Algeria",
                    ],
                    [
                        'locale'=>"ar",
                        'title'=>"عن الجزائر",
                    ],
                    [
                        'locale'=>"fr",
                        'title'=>"A propos de l'Algérie",
                    ]
                ], 
                'discover_algeria_subcontent' => 
                [ 
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 1,
                        'discover_algeria_subcontent_translate' => 
                        [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Algeria Monograph',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'دراسة الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Monographie de l'Algérie",
                                'sub_content_description' => "<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 2, 
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Natural Resources',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الموارد الطبيعية',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Ressources naturelles',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ] 
                    ],
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 3,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Political Systems',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>",
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'أنظمة سياسية',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Systèmes politiques',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 4,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Economic Indicators',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'المؤشرات الاقتصادية',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Indicateurs économiques',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 5,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Law and Legal Regime',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'القانون والنظام القانوني',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Loi et régime juridique',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>1,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 6,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Economic Environment',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'البيئة الاقتصادية',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Environnement économique',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                ],
            ],  
            [ 
                'created_by'            =>1,
                'updated_by'            =>1, 
                'content_key'           =>'living_in_algeria',
                'status'                =>1,
                'display_order'         =>2,
                'discover_algeria_content_translates' => 
                [
                    [
                        'locale'=>"en",
                        'title'=>"Living in Algeria",
                    ],
                    [
                        'locale'=>"ar",
                        'title'=>"يسكن في الجزائر",
                    ],
                    [
                        'locale'=>"fr",
                        'title'=>"Vivre en Algérie",
                    ]
                ], 
                'discover_algeria_subcontent' => 
                [ 
                    [
                        'content_id'=>2,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 1,
                        'discover_algeria_subcontent_translate' => 
                        [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Settling in Algeria',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الاستقرار في الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "S'installer en Algérie",
                                'sub_content_description' => "<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>2,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 2, 
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Working in Algeria',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'العمل في الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Travailler en Algérie',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ] 
                    ],
                    [
                        'content_id'=>2,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 3,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Studing in Algeria',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>",
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الدراسة في الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Etudier en Algérie',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>2,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 4,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Social protection in Algeria',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الحماية الاجتماعية في الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'La protection sociale en Algérie',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>2,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 5,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Taxation in Algeria',
                                'sub_content_description' =>"<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>",
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الضرائب في الجزائر',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Fiscalité en Algérie',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],

                ],
            ],
            [ 
                'created_by'            =>1,
                'updated_by'            =>1, 
                'content_key'           =>'why_investing_in_algeria',
                'status'                =>1,
                'display_order'         =>3,
                'discover_algeria_content_translates' => 
                [
                    [
                        'locale'=>"en",
                        'title'=>"Why investing in Algeria",
                    ],
                    [
                        'locale'=>"ar",
                        'title'=>"لماذا الاستثمار في الجزائر",
                    ],
                    [
                        'locale'=>"fr",
                        'title'=>"Pourquoi investir en Algérie",
                    ]
                ], 
                'discover_algeria_subcontent' => 
                [ 
                    [
                        'content_id'=>3,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 1,
                        'discover_algeria_subcontent_translate' => 
                        [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Cost of production factors',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'تكلفة عوامل الإنتاج',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Coût des facteurs de production",
                                'sub_content_description' => "<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>3,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 2, 
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Protection and arbitration agreements',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'اتفاقيات الحماية والتحكيم',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Conventions de protection et d'arbitrage",
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ] 
                    ],
                    [
                        'content_id'=>3,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 3,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Incentive measures',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'تدابير الحوافز',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Mesures incitatives',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>3,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 4,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Financing facilities',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'تسهيلات التمويل',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Facilités de financement',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>3,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 5,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Skilled labour',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'العمالة الماهرة',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Travail qualifié',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                ],
            ], 
            [ 
                'created_by'            =>1,
                'updated_by'            =>1,
                'content_key'           =>'growth_markets',
                'status'                =>1,
                'display_order'         =>4,
                'discover_algeria_content_translates' => 
                [
                    [
                        'locale'=>"en",
                        'title'=>"Growth Markets",
                    ],
                    [
                        'locale'=>"ar",
                        'title'=>"أسواق النمو",
                    ],
                    [
                        'locale'=>"fr",
                        'title'=>"Marchés de croissance",
                    ]
                ], 
                'discover_algeria_subcontent' => 
                [ 
                    [
                        'content_id'=>4,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 1,
                        'discover_algeria_subcontent_translate' => 
                        [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Hydocabons',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الهيدروكابونات',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Hydocabons",
                                'sub_content_description' => "<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>4,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 2, 
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Building Public Woks Hydraulic',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'مبنى ، مقاهي عامة ، هيدروليك',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Bâtiment, Woks publics, Hydraulique",
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ] 
                    ],
                    [
                        'content_id'=>4,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 3,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Agriculture',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الزراعة',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Agriculture',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>4,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 4,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Industry',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'صناعة',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Industrie',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>4,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 5,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Renewable Energies',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الطاقات المتجددة',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Énergies renouvelables',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                ],
            ], 
            [ 
                'created_by'            =>1,
                'updated_by'            =>1,
                'content_key'           =>'indicators',
                'status'                =>1,
                'display_order'         =>5,
                'discover_algeria_content_translates' => 
                [
                    [
                        'locale'=>"en",
                        'title'=>"Indicators",
                    ],
                    [
                        'locale'=>"ar",
                        'title'=>"المؤشرات",
                    ],
                    [
                        'locale'=>"fr",
                        'title'=>"Indicateurs",
                    ]
                ], 
                'discover_algeria_subcontent' => 
                [ 
                    [
                        'content_id'=>5,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 1,
                        'discover_algeria_subcontent_translate' => 
                        [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Growth',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'نمو',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Croissance",
                                'sub_content_description' => "<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>5,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 2,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Port & Aiport',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'الميناء والمطار',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Port et aéroport',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>5,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 3, 
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Road Network',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ],
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'شبكة الطرق',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum. </p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => "Réseau routier",
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ] 
                    ],
                    [
                        'content_id'=>5,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 4,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Rail Network',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. </p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'شبكة السكك الحديدية',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Réseau ferroviaire',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum.</p>",
                            ],
                        ]
                    ],
                    [
                        'content_id'=>5,
                        'created_by' =>1,
                        'updated_by' =>1,
                        'status' => 1,
                        'display_order' => 5,
                        'discover_algeria_subcontent_translate' => [ 
                            [
                                'locale' => 'en',
                                'sub_content_title' => 'Import',
                                'sub_content_description' =>'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>',
                            ], 
                            [ 
                                'locale' => 'ar',
                                'sub_content_title' => 'استيراد',
                                'sub_content_description' => '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لصنع كتاب عينة من النوع. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي بإصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>',
                            ],
                            [
                                'locale' => 'fr',
                                'sub_content_title' => 'Importer',
                                'sub_content_description' =>"<p>Lorem Ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem Ipsum est le texte factice standard de l'industrie depuis les années 1500, quand un imprimeur inconnu a pris une galère de caractères et l'a brouillée pour en faire un livre de spécimens. Il a survécu non seulement cinq siècles, mais aussi le saut dans la composition électronique, demeurant essentiellement inchangé. Il a été popularisé dans les années 1960 avec la sortie de feuilles Letraset contenant des passages du Lorem Ipsum, et plus récemment avec un logiciel de publication assistée par ordinateur comme Aldus PageMaker comprenant des versions de Lorem Ipsum. </p>",
                            ],
                        ]
                    ],
                ],
            ], 
            
        ]; 
        foreach ($discover_algeria_contents as $discover_algeria_content)
        { 
            $data = $discover_algeria_content;
            $translate = $data['discover_algeria_content_translates'];
            $sub_contents = $data['discover_algeria_subcontent']; 
            unset($data['discover_algeria_content_translates'],$data['discover_algeria_subcontent']);
            $result = DiscoverAlgeriaContent::create($data); 

            $translate[0]['content_id'] = $result->id;
            $translate[1]['content_id'] = $result->id;
            $translate[2]['content_id'] = $result->id;
            $result = DiscoverAlgeriaContentTranslate::insert($translate); 

            foreach ($sub_contents as $sub_content) {
                $sub_content_translate = $sub_content['discover_algeria_subcontent_translate'];
                unset($sub_content['discover_algeria_subcontent_translate']);

                $sub_content_result  = DiscoverAlgeriaSubcontent::create($sub_content);
                $sub_content_translate[0]['subcontent_id'] = $sub_content_result->id;
                $sub_content_translate[1]['subcontent_id'] = $sub_content_result->id;
                $sub_content_translate[2]['subcontent_id'] = $sub_content_result->id; 
                DiscoverAlgeriaSubcontentTranslate::insert($sub_content_translate); 
            }
        }
    }
}
