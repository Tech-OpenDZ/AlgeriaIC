<?php
function cp1252_to_utf8($str) {
    global $cp1252_map;
    return  strtr(utf8_encode($str), $cp1252_map);
}

    return [
        'ourServices' => 'Our sections',
        'subscribeNewsletter' => 'Subscribe to the Newsletter for Events',
        'subscribe' => 'SUBSCRIBE',
        'i2b' => 'algeria invest is a product of',
        'sitemap' => 'Sitemap',
        'privacyPolicy' => 'Privacy policy',
        'termsService' => 'Terms of service',
        'legalNotice' => 'Legal Notice',
        'discoverAlgeria' => 'Discover Algeria',
        'enter_email_address' => 'Enter email address',
        'news'                    => 'News',
        'events'                  => 'Events',
        'services'   => "Our services",
        'business_directory'        => 'Business Directory',
        'business_opportunities'  => 'Business opportunities',
        'business_intelligence'   => 'Business intelligence',
        'assitance_services'      => 'Assitance services',
        'business_environment'    => 'Business Environment',
        'follow_us'               => 'Follow Us',
        'copyright' => 'All rights reserved',
        'algeria_invest' => 'Algeria INVEST',
        'customer_register' => 'Tarification  and registration',
        'who_we_are' => 'About us',
        'copyright' => 'Algeria INVEST 2022 - All rights reserved.',

    ];
