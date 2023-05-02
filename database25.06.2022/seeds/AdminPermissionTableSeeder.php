<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminPermissionTableSeeder extends Seeder
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
                'name' => 'role-list',
                'module' => 'Manage-Role'
            ],
            [
                'name' => 'role-create',
                'module' => 'Manage-Role'
            ],
            [
                'name' => 'role-edit',
                'module' => 'Manage-Role'
            ],
            [
                'name' => 'role-delete',
                'module' => 'Manage-Role'
            ],
            [
                'name' => 'module-list',
                'module' => 'Manage-Module'
            ],
            [
                'name' => 'module-create',
                'module' => 'Manage-Module'
            ],
            [
                'name' => 'module-edit',
                'module' => 'Manage-Module'
            ],
            [
                'name' => 'module-delete',
                'module' => 'Manage-Module'
            ],
            [
                'name' => 'admin-list',
                'module' => 'Manage-Admin'
            ],
            [
                'name' => 'admin-create',
                'module' => 'Manage-Admin'
            ],
            [
                'name' => 'admin-edit',
                'module' => 'Manage-Admin'
            ],
            [
                'name' => 'admin-delete',
                'module' => 'Manage-Admin'
            ],
            [
                'name' => 'admin-change-password',
                'module' => 'Manage-Admin'
            ],
            [
                'name' => 'frontend-permission-list',
                'module' => 'Manage-Frontend-Permission'
            ],
            [
                'name' => 'frontend-permission-edit',
                'module' => 'Manage-Frontend-Permission'
            ],
            [
                'name' => 'frontend-permission-delete',
                'module' => 'Manage-Frontend-Permission'
            ],
            [
                'name' => 'frontend-permission-create',
                'module' => 'Manage-Frontend-Permission'
            ],
            [
                'name' => 'tender-list',
                'module' => 'Manage-Tender'
            ],
            [
                'name' => 'tender-create',
                'module' => 'Manage-Tender'
            ],
            [
                'name' => 'tender-edit',
                'module' => 'Manage-Tender'
            ],
            [
                'name' => 'tender-delete',
                'module' => 'Manage-Tender'
            ],
            [
                'name' => 'commercial-quotes-list',
                'module' => 'Manage-Commercial-Quotes'
            ],
            [
                'name' => 'commercial-quotes-create',
                'module' => 'Manage-Commercial-Quotes'
            ],
            [
                'name' => 'commercial-quotes-edit',
                'module' => 'Manage-Commercial-Quotes'
            ],
            [
                'name' => 'commercial-quotes-delete',
                'module' => 'Manage-Commercial-Quotes'
            ],
            [
                'name' => 'economical-indicator-list',
                'module' => 'Manage-Economical-Indicator'
            ],
            [
                'name' => 'economical-indicator-create',
                'module' => 'Manage-Economical-Indicator'
            ],
            [
                'name' => 'economical-indicator-edit',
                'module' => 'Manage-Economical-Indicator'
            ],
            [
                'name' => 'economical-indicator-delete',
                'module' => 'Manage-Economical-Indicator'
            ],
            [
                'name' => 'discover-algeria-list',
                'module' => 'Manage-Discover-Algeria'
            ],
            [
                'name' => 'discover-algeria-create',
                'module' => 'Manage-Discover-Algeria'
            ],
            [
                'name' => 'discover-algeria-edit',
                'module' => 'Manage-Discover-Algeria'
            ],
            [
                'name' => 'discover-algeria-delete',
                'module' => 'Manage-Discover-Algeria'
            ],
            [
                'name' => 'discover-algeria-subcontent-list',
                'module' => 'Manage-Discover-Algeria-Subcontent'
            ],
            [
                'name' => 'discover-algeria-subcontent-create',
                'module' => 'Manage-Discover-Algeria-Subcontent'
            ],
            [
                'name' => 'discover-algeria-subcontent-edit',
                'module' => 'Manage-Discover-Algeria-Subcontent'
            ],
            [
                'name' => 'discover-algeria-subcontent-delete',
                'module' => 'Manage-Discover-Algeria-Subcontent'
            ],
            [
                'name' => 'business-environment-list',
                'module' => 'Manage-Business-Environment'
            ],
            [
                'name' => 'business-environment-create',
                'module' => 'Manage-Business-Environment'
            ],
            [
                'name' => 'business-environment-edit',
                'module' => 'Manage-Business-Environment'
            ],
            [
                'name' => 'business-environment-delete',
                'module' => 'Manage-Business-Environment'
            ], 
            [
                'name' => 'news-list',
                'module' => 'Manage-News'
            ],
            [
                'name' => 'news-create',
                'module' => 'Manage-News'
            ],
            [
                'name' => 'news-edit',
                'module' => 'Manage-News'
            ],
            [
                'name' => 'news-delete',
                'module' => 'Manage-News'
            ], 
            [
                'name' => 'news-source-list',
                'module' => 'Manage-News-Source'
            ],
            [
                'name' => 'news-source-create',
                'module' => 'Manage-News-Source'
            ],
            [
                'name' => 'news-source-edit',
                'module' => 'Manage-News-Source'
            ],
            [
                'name' => 'news-source-delete',
                'module' => 'Manage-News-Source'
            ], 
            [
                'name' => 'event-list',
                'module' => 'Manage-Event'
            ],
            [
                'name' => 'event-create',
                'module' => 'Manage-Event'
            ],
            [
                'name' => 'event-edit',
                'module' => 'Manage-Event'
            ],
            [
                'name' => 'event-delete',
                'module' => 'Manage-Event'
            ],   
            [
                'name' => 'contact-file-pending-request-list',
                'module' => 'Manage-Contact-File'
            ], 
            [
                'name' => 'contact-file-validated-request-list',
                'module' => 'Manage-Contact-File'
            ], 
            [
                'name' => 'contact-file-canceled-request-list',
                'module' => 'Manage-Contact-File'
            ], 
            [
                'name' => 'press-review-pending-request-list',
                'module' => 'Manage-Press-Review'
            ], 
            [
                'name' => 'press-review-validated-request-list',
                'module' => 'Manage-Press-Review'
            ], 
            [
                'name' => 'press-review-canceled-request-list',
                'module' => 'Manage-Press-Review'
            ], 
            [
                'name' => 'press-review-cancel-request',
                'module' => 'Manage-Press-Review'
            ],
            [
                'name' => 'press-review-validate-request',
                'module' => 'Manage-Press-Review'
            ],
            [
                'name' => 'business-opportunity-list',
                'module' => 'Manage-Business-Opportunity'
            ],
            [
                'name' => 'business-opportunity-create',
                'module' => 'Manage-Business-Opportunity'
            ],
            [
                'name' => 'business-opportunity-edit',
                'module' => 'Manage-Business-Opportunity'
            ],
            [
                'name' => 'business-opportunity-delete',
                'module' => 'Manage-Business-Opportunity'
            ],  
            [
                'name' => 'manage-our-service',
                'module' => 'Manage-Our-service'
            ], 
            [
                'name' => 'assistance-service-list',
                'module' => 'Manage-Our-service'
            ], 
            [
                'name' => 'assistance-service-edit',
                'module' => 'Manage-Our-service'
            ], 
            [
                'name' => 'assistance-service-delete',
                'module' => 'Manage-Our-service'
            ], 
            [
                'name' => 'company-list',
                'module' => 'Manage-Company'
            ],
            [
                'name' => 'company-create',
                'module' => 'Manage-Company'
            ],
            [
                'name' => 'company-edit',
                'module' => 'Manage-Company'
            ],
            [
                'name' => 'company-delete',
                'module' => 'Manage-Company'
            ],
            [
                'name' => 'service-category-list',
                'module' => 'Manage-Service-Category'
            ],
            [
                'name' => 'service-category-create',
                'module' => 'Manage-Service-Category'
            ],
            [
                'name' => 'service-category-edit',
                'module' => 'Manage-Service-Category'
            ],
            [
                'name' => 'service-category-delete',
                'module' => 'Manage-Service-Category'
            ], 
            [
                'name' => 'service-list',
                'module' => 'Manage-Service'
            ],
            [
                'name' => 'service-create',
                'module' => 'Manage-Service'
            ],
            [
                'name' => 'service-edit',
                'module' => 'Manage-Service'
            ],
            [
                'name' => 'service-delete',
                'module' => 'Manage-Service'
            ],
            [
                'name' => 'business-meeting-list',
                'module' => 'Manage-Business-Meeting'
            ],
            [
                'name' => 'business-meeting-create',
                'module' => 'Manage-Business-Meeting'
            ],
            [
                'name' => 'business-meeting-edit',
                'module' => 'Manage-Business-Meeting'
            ],
            [
                'name' => 'business-meeting-delete',
                'module' => 'Manage-Business-Meeting'
            ], 
            [
                'name' => 'partner-list',
                'module' => 'Manage-Partner'
            ],
            [
                'name' => 'partner-create',
                'module' => 'Manage-Partner'
            ],
            [
                'name' => 'partner-edit',
                'module' => 'Manage-Partner'
            ],
            [
                'name' => 'partner-delete',
                'module' => 'Manage-Partner'
            ],  
            [
                'name' => 'faq-list',
                'module' => 'Manage-FAQ'
            ],
            [
                'name' => 'faq-create',
                'module' => 'Manage-FAQ'
            ],
            [
                'name' => 'faq-edit',
                'module' => 'Manage-FAQ'
            ],
            [
                'name' => 'faq-delete',
                'module' => 'Manage-FAQ'
            ],  
            [
                'name' => 'banner-list',
                'module' => 'Manage-Banner'
            ],
            [
                'name' => 'banner-create',
                'module' => 'Manage-Banner'
            ],
            [
                'name' => 'banner-edit',
                'module' => 'Manage-Banner'
            ],
            [
                'name' => 'banner-delete',
                'module' => 'Manage-Banner'
            ], 
            [
                'name' => 'page-content-list',
                'module' => 'Manage-Page-Content'
            ],
            [
                'name' => 'page-content-create',
                'module' => 'Manage-Page-Content'
            ],
            [
                'name' => 'page-content-edit',
                'module' => 'Manage-Page-Content'
            ],
            [
                'name' => 'page-content-delete',
                'module' => 'Manage-Page-Content'
            ], 
            [
                'name' => 'testimonial-list',
                'module' => 'Manage-Testimonial'
            ],
            [
                'name' => 'testimonial-create',
                'module' => 'Manage-Testimonial'
            ],
            [
                'name' => 'testimonial-edit',
                'module' => 'Manage-Testimonial'
            ],
            [
                'name' => 'testimonial-delete',
                'module' => 'Manage-Testimonial'
            ], 
            [
                'name' => 'zone-list',
                'module' => 'Manage-Zone'
            ],
            [
                'name' => 'zone-create',
                'module' => 'Manage-Zone'
            ],
            [
                'name' => 'zone-edit',
                'module' => 'Manage-Zone'
            ],
            [
                'name' => 'zone-delete',
                'module' => 'Manage-Zone'
            ], 
            [
                'name' => 'sector-list',
                'module' => 'Manage-Sector'
            ],
            [
                'name' => 'sector-create',
                'module' => 'Manage-Sector'
            ],
            [
                'name' => 'sector-edit',
                'module' => 'Manage-Sector'
            ],
            [
                'name' => 'sector-delete',
                'module' => 'Manage-Sector'
            ], 
            [
                'name' => 'setting-list',
                'module' => 'Manage-Setting'
            ],
            [
                'name' => 'setting-edit',
                'module' => 'Manage-Setting'
            ],
            [
                'name' => 'activity-code-list',
                'module' => 'Manage-Activity-Code'
            ],
            [
                'name' => 'activity-code-create',
                'module' => 'Manage-Activity-Code'
            ],
            [
                'name' => 'activity-code-edit',
                'module' => 'Manage-Activity-Code'
            ],
            [
                'name' => 'activity-code-delete',
                'module' => 'Manage-Activity-Code'
            ],
            [
                'name' => 'payment-configuration-list',
                'module' => 'Manage-Payment-Configuration'
            ],
            [
                'name' => 'payment-configuration-edit',
                'module' => 'Manage-Payment-Configuration'
            ], 
            [
                'name' => 'product-list',
                'module' => 'Manage-Product'
            ],
            [
                'name' => 'product-create',
                'module' => 'Manage-Product'
            ],
            [
                'name' => 'product-edit',
                'module' => 'Manage-Product'
            ],
            [
                'name' => 'product-delete',
                'module' => 'Manage-Product'
            ], 
            [
                'name' => 'general-setting-list',
                'module' => 'Manage-General-Setting'
            ],
            [
                'name' => 'general-setting-edit',
                'module' => 'Manage-General-Setting'
            ],
            [
                'name' => 'subscription-list',
                'module' => 'Manage-Subscription'
            ],
            [
                'name' => 'subscription-create',
                'module' => 'Manage-Subscription'
            ],
            [
                'name' => 'subscription-edit',
                'module' => 'Manage-Subscription'
            ],
            [
                'name' => 'subscription-delete',
                'module' => 'Manage-Subscription'
            ], 
            [
                'name' => 'subscribers-list',
                'module' => 'Manage-Subscription'
            ], 
            [
                'name' => 'subscribers-view',
                'module' => 'Manage-Subscription'
            ], 
            [
                'name' => 'user-list',
                'module' => 'Manage-User'
            ], 
            [
                'name' => 'user-view',
                'module' => 'Manage-User'
            ], 
            [
                'name' => 'user-active-deactive',
                'module' => 'Manage-User'
            ], 
            [
                'name' => 'advertisement-create',
                'module' => 'Manage-Advertisement'
            ],
            [
                'name' => 'advertisement-edit',
                'module' => 'Manage-Advertisement'
            ],
            [
                'name' => 'advertisement-delete',
                'module' => 'Manage-Advertisement'
            ], 
            [
                'name' => 'advertisement-list',
                'module' => 'Manage-Advertisement'
            ], 
            [
                'name' => 'advertisement-report',
                'module' => 'Manage-Advertisement'
            ], 
            [
                'name' => 'newsletter-export',
                'module' => 'Manage-Newsletter'
            ], 
            [
                'name' => 'newsletter-edit',
                'module' => 'Manage-Newsletter'
            ],
            [
                'name' => 'newsletter-delete',
                'module' => 'Manage-Newsletter'
            ], 
            [
                'name' => 'newsletter-list',
                'module' => 'Manage-Newsletter'
            ], 
            [
                'name' => 'payment-edit',
                'module' => 'Manage-Payment'
            ],
            [
                'name' => 'payment-delete',
                'module' => 'Manage-Payment'
            ], 
            [
                'name' => 'payment-list',
                'module' => 'Manage-Payment'
            ], 
            [
                'name' => 'enquiry-list',
                'module' => 'Manage-Enquiry'
            ],
            [
                'name' => 'enquiry-delete',
                'module' => 'Manage-Enquiry'
            ], 
            [
                'name' => 'enquiry-reply',
                'module' => 'Manage-Enquiry'
            ],    
            [
                'name' => 'manage-business-intelligence',
                'module' => 'Manage-Business-Intelligence'
            ], 
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
