<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.customerhome');
//     // if(Auth::guard('customer')->check()) {
//     //     return redirect()->route('customer-home');
//     // } else {
//     //     return redirect()->route('customer-home');
//     // }
// });


Auth::routes();
Route::get('login',function(){
    return abort(404);
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    //$exitCode1 = Artisan::call('config:clear');
    // return what you want
});

// Route::get('login', 'YourController@doYourFuntion')->name('name');

Route::get('test', 'Frontend\AuthController@sendMail');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin-login');
Route::post('admin/login', 'Auth\LoginController@login')->name('admin.login.submit');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth'] ], function () {
    Route::get('/', function () {
        return view('admin/layouts/master');
    });


    Route::resource('roles','RoleController');

    Route::resource('manage-admin-permission','AdminPermissionController')->except(['show']);

    // -----------Home page content---------
    Route::resource('manage-our-services', 'OurServicesController')->except(['show']);
    Route::resource('manage-assistance-services', 'AssistanceServiceController')->except(['show']);
    Route::resource('manage-commercial-quotes', 'CommercialController')->except(['show']);
    Route::resource('manage-economical', 'EconomicController')->except(['show']);
    Route::get('manage-commercial-quotes/{id}/delete', 'CommercialController@delete')->name('commercialDelete');
    Route::get('manage-economical/{id}/delete', 'EconomicController@delete')->name('economicDelete');
    // Route::resource('manage-business-intelligences', 'BusinessIntelligenceController')->except(['show']);
    // -------------End----------
    Route::resource('manage-content', 'ContentController')->except(['show']);
    Route::resource('manage-testimonial', 'TestimonialController')->except(['show']);
    Route::resource('manage-banner', 'BannerController')->except(['show']);
    Route::get('manage-banners/{id}/edit', 'BannerController@editBanner')->name('edit-banner');
    Route::post('manage-banners/{id}/update', 'BannerController@updateBanner')->name('update-banner');
    Route::get('banner_display/{id}', 'BannerController@Bannerdisplay')->name('displayBanner');
    Route::get('manage-banner/{id}/delete', 'BannerController@delete')->name('bannerDelete');
    Route::resource('manage-subscription', 'SubscriptionController');
    Route::get('manage-subscription/{id}/subscribers', 'SubscriptionController@getSubscriberList')->name('manage-subscription.subscribers');

    Route::get('statistics-visitors', 'User2Controller@statisticsVisitors')->name('statistics-visitors');
       // Route::get('statistics', 'StatisticsController@index')->name('statistics-visit');
    Route::resource('manage-statistics', 'StatisticsController');

    Route::resource('manage-news', 'NewsController');
    Route::delete('delete-news-image', 'NewsController@imageDestroy')->name('destroy-news-image');
    Route::resource('manage-advertisement', 'AdvertisementController');
    Route::post('manage-advertisement-report','AdvertisementController@sendReport')->name('manage-advertisement-report');
    Route::resource('manage-service', 'ServiceController')->except(['show']);
    Route::resource('manage-service-category', 'ServiceCategoryController')->except(['show']);


    Route::resource('manage-inquiry', 'InquiryAdminController');
    Route::get('manage-inquiry/{id}/delete', 'InquiryAdminController@delete');

    Route::resource('manage-registrant', 'RegistrantAdminController');
    Route::get('manage-registrant/{id}/delete', 'RegistrantAdminController@delete');



    Route::resource('manage-faq', 'FaqController');
    Route::resource('manage-event', 'EventController')->except(['show']);
    Route::get('manage-event/upload', 'EventController@upload')->name('manage-event.upload');
    Route::post('manage-event/upload-document', 'EventController@uploadDocument')->name('manage-event.upload-document');
    Route::get('manage-event/delete-document/{locale}', 'EventController@deleteDocument')->name('manage-event.delete-document');
    Route::get('delete-document', 'EventController@deleteEventDocument')->name('delete-document');
    Route::post('manage-newsletter/export/', 'NewsletterController@exporttoexcel')->name('manage-newsletter.export');
    Route::resource('manage-newsletter', 'NewsletterController')->except(['show']);
    Route::resource('manage-payment', 'PaymentController')->except(['show','create','store']);
    Route::resource('manage-company', 'CompanyController')->except(['show']);
    Route::delete('delete-product/', 'CompanyController@deleteProduct')->name('delete-products');
    Route::delete('delete-contact/', 'CompanyController@deleteContact')->name('delete-contacts');
    Route::delete('destroy-product-image','CompanyController@deleteImage')->name('destroy-product-image');
    Route::get('addmore-product','CompanyController@addMore')->name('product-addmore');
    Route::resource('manage-business-meeting', 'BusinessMeetingController');
    Route::resource('manage-business-event', 'BusinessEventController');
    Route::get('business-environment/', 'ResourceController@indexContent')->name('business-environment-index');
   


  


    Route::resource('manage-business-opportunity', 'BusinessOpportunityController');
    Route::resource('manage-partner', 'PartnerController')->except(['show']);
    Route::resource('manage-setting', 'SettingController')->except(['show']);
    Route::resource('manage-admin', 'AdminController')->except(['show']);
    Route::resource('manage-sector', 'SectorController')->except(['show']);
    Route::resource('manage-source', 'SourceController')->except(['show']);
    Route::resource('manage-news_source', 'NewsSourceController')->except(['show']);
    Route::resource('manage-event', 'EventController')->except(['show']);
    Route::delete('delete-image', 'EventController@imageDestroy')->name('destroy-image');
    Route::delete('delete-reference', 'EventController@referenceDestroy')->name('destroy-reference');
    Route::resource('manage-zone', 'ZoneController')->except(['show']);
    Route::resource('manage-discover-algeria-content', 'DiscoverAlgeriaContentController')->except(['show']);
    Route::resource('manage-algeria-subcontent', 'DiscoverAlgeriaSubcontentController')->except(['show']);
    Route::resource('manage-frontend-permission', 'FrontendPermissionController')->except(['show','create','store']);
    Route::resource('manage-contact-details', 'ContactDetailsController')->except(['show']);
    Route::resource('manage-algeria-business-network', 'AlgeriaBusinessNetworkController')->except(['show']);
    Route::delete('destroy-bo-document', 'BusinessOpportunityController@documentDestroy')->name('destroy-bo-document');
    Route::delete('destroy-exhibitor', 'EventController@deleteExhibitor')->name('destroy-exhibitor');
    Route::resource('manage-code', 'ActivityCodeController')->except(['show']);
    Route::get('code/import', 'ActivityCodeController@create_code')->name('manage-code.import');
    Route::post('manage-code/import', 'ActivityCodeController@import')->name('manage-code-import');
    Route::get('donwload-file', 'ActivityCodeController@downloadFile')->name('donwload-file');
    Route::resource('manage-business-environment', 'ResourceController')->except(['show']);
    Route::resource('manage-payment-configuration', 'PaymentConfigurationController')->except(['create','show','store']);
    Route::get('pending-request','PressReviewController@index')->name('pending-request');
    Route::get('canceled-request','PressReviewController@canceledRequest')->name('canceled-request');
    Route::get('validate-request/{token?}','PressReviewController@validateRequest')->name('validate-request');
    Route::get('validated-request','PressReviewController@validatedRequest')->name('validated-request');
    Route::get('cancel-request/{token?}','PressReviewController@cancelRequest')->name('cancel-request');
    Route::get('transaction_details','PressReviewController@transactionDetails')->name('transaction_details');
    Route::get('transaction_detail','ContactFileController@transactionDetails')->name('transaction_detail');
    Route::get('import', 'CompanyController@import')->name('import-company');
    Route::post('company/import', 'CompanyController@storeCompany')->name('store-company');

    Route::get('download-pdf/{token?}','PressReviewController@download')->name('download-pdf');

    Route::get('/change_password', function () {
        return view('admin/profile/change_password');
    });
    Route::post('/reset_password', 'AdminController@changePassword')->name('change-password');

    /*manage tenders*/
    Route::resource('manage-tender', 'TenderController')->except(['show']);

    /*manage BI report section for homepage*/
    Route::resource('manage-bi-report', 'BusinessIntelligenceReportsController')->except(['show']);

    /* manage contact file routes */
    Route::resource('manage-contact-file', 'ContactFileController');
    Route::get('validate-contact-file-request/{token?}', 'ContactFileController@validateRequest')->name('validate-contact-file-request');
    Route::get('cancel-contact-file-request/{token?}/{transaction_id?}', 'ContactFileController@cancelRequest')->name('cancel-contact-file-request');
    Route::get('cancelled-contact-file-request', 'ContactFileController@cancelledRequest')->name('cancelled-contact-file-request');
    Route::get('validated-contact-file-request', 'ContactFileController@validatedRequest')->name('validated-contact-file-request');

    /**
     * All the routes for user menu is here.
     */
    Route::get('manage-user', 'UserController@index')->name('manage-user');
    Route::get('manage-user-detail/{id}', 'UserController@getUserDetail')->name('manage-user-detail');
    Route::get('update-user/{id}' , 'User2Controller@getUserDetail')->name('update-user');
    Route::get('new_subscriber_list', 'User2Controller@indexNew')->name('new_subscriber_list');
    Route::get('actif_subscriber_list', 'User2Controller@indexActive')->name('actif_subscriber_list');
    Route::get('suspended_subscriber_list', 'User2Controller@indexSuspended')->name('suspended_subscriber_list');
    Route::post('deactive-user/{id}', 'UserController@deactivateUser')->name('deactive-user');
    Route::post('active-user/{id}', 'UserController@activateUser')->name('active-user');
    Route::post('delete-user/{id}', 'UserController@deleteUser')->name('delete-user');
    Route::post('user-update/', 'User2Controller@userUpdate')->name('userUpdate');

    //Route::put('manage-user-update', [UserController::class, 'update'])->name('user-update');

    Route::resource('manage-product', 'ProductController')->except(['show']);
    Route::resource('manage-business-intelligence', 'Business_IntelligenceController')->except(['show']);
    Route::get('create-dashboard/{user_id}', 'Business_IntelligenceController@createDashboard')->name('create-dashboard');
    Route::get('create-dashboard/', 'Business_IntelligenceController@createDashboard')->name('create-dashboards');
    Route::post('store-dashboard', 'Business_IntelligenceController@storeDashboard')->name('store-dashboard');
    Route::get('dashboard-list/{id}', 'Business_IntelligenceController@dashboardList')->name('dashboard-list');
    Route::get('edit-dashboard/{id}', 'Business_IntelligenceController@editDashboard')->name('edit-dashboard');
    Route::post('update-dashboard/{id}', 'Business_IntelligenceController@updateDashboard')->name('update-dashboard');
    Route::delete('delete-dashboard','Business_IntelligenceController@destroy')->name('delete-dashboard');
    Route::get('manage-sub-dashboard/{id}/{report_id}', 'BISubDashboardController@index')->name('manage-sub-dashboard.index');
    Route::get('create-sub-dashboard/{id}/{report_id}', 'BISubDashboardController@create')->name('manage-sub-dashboard.create');
    Route::post('store-sub-dashboard', 'BISubDashboardController@store')->name('manage-sub-dashboard.store');
    Route::get('edit-sub-dashboard/{id}', 'BISubDashboardController@edit')->name('manage-sub-dashboard.edit');
    Route::post('update-sub-dashboard/{id}', 'BISubDashboardController@update')->name('manage-sub-dashboard.update');
    Route::delete('delete-sub-dashboard','BISubDashboardController@destroy')->name('manage-sub-dashboard.delete');
    Route::get('manage-report/{id}/{report_id}', 'BIReportsController@index')->name('manage-report.index');
    Route::get('create-report/{id}/{report_id}', 'BIReportsController@create')->name('manage-report.create');
    Route::post('store-report', 'BIReportsController@store')->name('manage-report.store');
    Route::get('edit-report/{id}', 'BIReportsController@edit')->name('manage-report.edit');
    Route::post('update-report/{id}', 'BIReportsController@update')->name('manage-report.update');
    Route::delete('delete-report','BIReportsController@destroy')->name('manage-report.delete');
    Route::get('manage-style-sheet/{id}', 'ShuttleSheetController@index')->name('manage-shuttle-sheet.index');
    Route::get('create-shuttle-sheet/{id}', 'ShuttleSheetController@create')->name('manage-shuttle-sheet.create');
    Route::post('store-shuttle-sheet', 'ShuttleSheetController@store')->name('manage-shuttle-sheet.store');
    Route::get('edit-shuttle-sheet/{id}', 'ShuttleSheetController@edit')->name('manage-shuttle-sheet.edit');
    Route::post('update-shuttle-sheet/{id}', 'ShuttleSheetController@update')->name('manage-shuttle-sheet.update');
    Route::delete('delete-shuttle-sheet','ShuttleSheetController@destroy')->name('manage-shuttle-sheet.delete');
    Route::get('dashboard-list', 'Business_IntelligenceController@dashboardLists')->name('dashboard');

});


// All the translated routes will be here -author Nikhil Kumar Mishra
Route::group(['namespace' => 'Frontend','prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localize' ]], function () {

    $currentRoute = url()->current();
    $baseUrl = url()->to('/');
    if($currentRoute != $baseUrl && !Session::has('openLogin')){
        Session::put('previous_url_for_login',$currentRoute);
    }

    Route::get('home','HomeController@index');
    //LaravelLocalization::transRoute('routes.signup')

    Route::get('/','HomeController@indexNew')->name('customer-home');

    //----------Customer Email Activation route-----------

    Route::get('/email-activation/{token}', 'AuthController@activateEmail')->name('customer-activate')->middleware('guest:customer');

    //----------Customer Email Activation Link Expired route-----------
    Route::get('/link-expired', 'AuthController@linkExpired')->name('link-expired')->middleware('guest:customer');

    //----------Customer Signup route-----------
    Route::get('/signup', 'AuthController@index')->name('customer-register')->middleware('guest:customer');
    Route::post('/signup-validate', 'AuthController@storeCustomer')->name('customer-store');
    Route::post('/signup', 'AuthController@storePayment')->name('customer-paymentMode');

    Route::get('/callback',function() {
        return view('frontend.signup.returnUrl');
    })->name('returnUrl');

    Route::get('/failUrl',function() {
        return view('frontend.signup.failUrl');
    })->name('failUrl');

    //----------------My Account link is here-----------------
    Route::get('/my-account', 'AuthController@myAccount')->name('customer-account')->middleware('auth:customer');

    //----------------Upgrade Plan link is here-----------------
    Route::get('/upgrade-plan', 'AuthController@upgradeSubscriptionPlan')->name('upgrade-plan')->middleware('auth:customer');

    //----------------Payment link is here-----------------
    Route::post('/payment', 'AuthController@paymentPage')->name('payment')->middleware('auth:customer');
    Route::post('/payment-confirm', 'AuthController@paymentConfirm')->name('payment-confirm')->middleware('auth:customer');
    Route::get('/payment-success', 'AuthController@paymentSuccess')->name('payment-success')->middleware('auth:customer');

    //----------------Add sub user form here-----------------
    Route::post('/add-sub-user', 'AuthController@addSubUser')->name('customer-add-sub-user')->middleware('auth:customer');
    Route::post('/customer-update', 'AuthController@updateCustomerData')->name('customer-update')->middleware('auth:customer');

    //----------------Remove sub user form here-----------------
    Route::delete('/remove-sub-user', 'AuthController@removeSubUser')->name('customer-remove-sub-user')->middleware('auth:customer');

    //----------------Accept invitation link is here-----------------
    Route::get('/customer-accept-invitation/{token}', 'AuthController@acceptInvitation')->name('customer-accept-invitation')->middleware('guest:customer');
    Route::post('/register-sub-user/{token}', 'AuthController@registerSubUser')->name('register-sub-user')->middleware('guest:customer');



    Route::get('/faq', 'FaqController@index')->name('faq');
    Route::get('/discover-algeria/{key?}', 'DiscoverAlgeriaController@index')->name('discover-algeria');
    Route::get('/algeria-business-network', 'AlgeriaBusinessNetworkController@index')->name('algeria-business-network');
    Route::post('/ad', 'AdvertisementController@click')->name('advertisement.click');
    Route::post('/read-more-data', 'TestimonialController@readMoreData')->name('read-more-data');

    //----------Customer Auth login route-----------
    Route::namespace('Auth')->group(function(){
        Route::post('/customerlogin','LoginController@login')->name('customer-login');
        Route::post('/customerlogout','LoginController@logout')->name('customer-logout');

        // ------------Forget Password route------------
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('customer.password.reset');
        Route::post('forget-password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
        Route::get('reset-password/{token}','ResetPasswordController@showResetForm')->name('reset-password.reset');
        Route::post('reset-password', 'ResetPasswordController@resetPassword')->name('customer-reset-password');
    });
    // ------------------------------------------------
    // ----------------Customer after login--------------
    // Route::get('/homepage', 'HomeController@index')->name('customer-home');
    Route::post('/readmoredata', 'HomeController@readmoredata')->name('readmoredata');

    // Routes related to testimonials page
    Route::get('/testimonials', 'TestimonialController@index')->name('testimonials');
    Route::post('/loadmoredata', 'TestimonialController@loadMoreData')->name('loadmoredata');

    // Routes for contact us
    Route::get('/contactus', 'InquiryController@index')->name('contactus');
    Route::post('/contactus', 'InquiryController@store')->name('contactus-store');


  
    Route::get('/event-inscription', 'RegistrantController@index')->name('registration-page');
    Route::post('/event-inscription', 'RegistrantController@store')->name('registration-store');


    //----------Route for change password----------------------
    Route::get('/change_password','ChangePasswordController@show')->name('change-password-form');
    Route::post('/change_customerpassword','ChangePasswordController@changePassword')->name('customer-change-password');

    //----------Route for News----------------------
    Route::get('/news','NewsController@index')->name('news-list');
    Route::get('/news/{slug}','NewsController@show')->name('news-detail');
    Route::get('/premium-news','NewsController@indexPremium')->name('premium-news-list');
    Route::get('/premium-news/{slug}','NewsController@showPremium')->name('premium-news-detail');
	Route::get('/premium-news_free/{slug}','NewsController@showPremium_free')->name('premium-news_free-detail');
    Route::get('/add-premium-news', 'NewsController@create')->name('add-premium-news');
    Route::post('/premium-news-store', 'NewsController@store')->name('premium-news-store');

    Route::get('/externe-premium-news',function(){
        return view('admin.news.extern');
    })->name('externe-premium-news');

    //----------Route for Event----------------------
    Route::get('/event','EventController@index')->name('event-list');
    Route::get('/upcoming-event','EventController@listUpcomingEvent')->name('upcoming-event-list');
    Route::get('/upcoming-event-download','EventController@listUpcomingEvent')->name('event-upcoming-download');
    Route::get('/past-event','EventController@listPastEvent')->name('past-event-list')->middleware('auth:customer')->middleware('frontend-permission:events_past_events_report');
    Route::get('/past-event-detail/{slug}','EventController@showPastEvent')->name('past-event-detail')->middleware('auth:customer')->middleware('frontend-permission:events_past_events_report');
    Route::get('/upcoming-event-detail/{slug}','EventController@showUpcomingEvent')->name('upcoming-event-detail');
    Route::get('/upcoming-event-participants-download/{id}','EventController@exportExhibitor')->name('upcoming-event-exhibitor-export');
    Route::get('/past-event-exhibitor-download/{id}','EventController@exportExhibitor')->name('past-event-exhibitor-download');

    Route::get('/encours-event-list','EventController@listEnCoursEvent')->name('encours-event-list');
    Route::get('/canceled-event-list','EventController@listCanceledEvent')->name('canceled-event-list');
   
   /* Route::get('/encours-event-list',function() {
        return view('frontend.event.event_encours_list');
    })->name('encours-event-list');*/

    Route::get('/event-encours-detail/{slug}','EventController@showEnCoursEvent')->name('event-encours-detail');

    Route::get('/postponed-event','EventController@listPostponedEvent')->name('postponed-event-list');
    Route::get('/event-postponed-detail/{slug}','EventController@showPostponedEvent')->name('event-postponed-detail');

    Route::get('/canceled-event','EventController@listCanceledEvent')->name('canceled-event-list');
    Route::get('/event-canceled-detail/{slug}','EventController@showCanceledEvent')->name('event-canceled-detail');

    // Routes for Business Opportunity
    //Route::get('/add-business-opportunity', 'BusinessOpportunityController@create')->name('add-business-opportunity')->middleware('auth:customer'); // je l'aurai besoin quand on remettra add-opportunity avec autentification
    Route::get('/add-business-opportunity', 'BusinessOpportunityController@create')->name('add-business-opportunity');
    Route::post('/business-opportunity', 'BusinessOpportunityController@store')->name('business-opportunity-store');
   // Route::get('/business-opportunity', 'BusinessOpportunityController@index')->name('business-opportunity')->middleware('auth:customer');
    Route::get('/business-opportunity', 'BusinessOpportunityController@index')->name('business-opportunity');
    Route::get('/business-opportunity/sector/{id}', 'BusinessOpportunityController@sector_details')->name('business-opportunity-sector-details');
   // Route::get('/business-opportunity/sector/{sector_id}/details/{id}', 'BusinessOpportunityController@show')->name('business-opportunity-details')->middleware('auth:customer'); // je l'aurai besoin quand on remettra opportunity detaille avec autentification
   Route::get('/business-opportunity/sector/{sector_id}/details/{id}', 'BusinessOpportunityController@show')->name('business-opportunity-details'); 

    // ------------------Route for newsletter---------------------
    Route::get('/subscribe-to-newsletters','NewsletterController@create')->name('subscribe.create');
    Route::post('subscribe-to-newsletters','NewsletterController@subscribe_store')->name('subscribe-store');
    // ---------------Event-Newsletter------------------------------
    Route::get('/event-newsletters','NewsletterController@event_create')->name('event.create');
    Route::post('event-newsletters','NewsletterController@event_store')->name('event-store');
    // ---------------Business-Newsletter------------------------------
    Route::get('/business-newsletters','NewsletterController@business_create')->name('business.create');
    Route::post('business-newsletters','NewsletterController@business_store')->name('business-store');
    // ---------------Resource-Newsletter------------------------------
    Route::get('/resource-newsletters','NewsletterController@resources_create')->name('resource.create');
    Route::post('resource-newsletters','NewsletterController@resource_store')->name('resource-store');


    

    // ---------------Company Route-----------------------------------------------

    Route::get('/add-company-profile','CompanyController@create')->name('add-company-profile')->middleware('auth:customer');
    Route::post('add-company-profile','CompanyController@store')->name('companies-store');
    // Route::post('home-events','NewsletterController@event_newsletters')->name('event-newsletters');
    Route::post('home-subscribe-newsletters','NewsletterController@subscribe_newsletters')->name('subscribe_newsletters');
    Route::post('economic_subscribe','NewsletterController@economic_newsletters')->name('economic_newsletters');
    Route::get('/business-intelligence', 'BusinessIntelligenceController@index')->name('business-intelligence');
    Route::get('/business-intelligence/{key}','BusinessIntelligenceController@subDashboard')->name('business-intelligence-subdashboard')->middleware('auth:customer');
    Route::get('/our-services', 'ServiceController@index')->name('services');
    Route::get('/sitemap', 'ContentController@getSitemap')->name('sitemap');
    Route::get('/gallery',function() {
        return view('frontend.layouts.gallery');
    })->name('gallery');


    /* ---------------------------  QHSE ---------------------------------- */









    Route::get('/qhse', 'QhseController@index')->name('qhse');
    /* ----------------------------Fin Route QHSE ----------------------------------*/

    Route::get('/presse',function() {
        return view('frontend.layouts.presse');
    })->name('presse');




    Route::get('/contact_post',function() {
        return view('frontend.layouts.contact_post');
    })->name('contact_post');

    Route::get('/add',function(){
        return view('admin.subscription.add');
    })->name('add_customer');




    Route::get('/add-registrant',function(){
        return view('admin.registrant.add-registrant');
    })->name('add-registrant');


    /*Route::get('/admin/valide-update',function(){
        return view('admin.subscription.valide-update');
    })->name('valide-update');*/


    Route::get('admin/update-row/{id}', 'InquiryController@getRowsDetail')->name('update-row');
    Route::get('admin/inquiry-row-detail/{id}', 'InquiryController@getInquiryRowsDetail')->name('inquiry-row-detail');

    Route::post('admin/row-update', 'InquiryController@rowUpdate')->name('rowUpdate');




    Route::get('admin/update-registrant/{id}', 'RegistrantController@getRegistrantDetail')->name('update-registrant');

    Route::post('admin/registrant-update', 'RegistrantController@registrantUpdate')->name('updateRegistrant');

    Route::post('/add-registrant', 'RegistrantController@storeAdmin')->name('registrant-storeAdmin');

   /* Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth'] ], function () {
        Route::get('admin/update-row', 'InquiryAdminController@getRowsDetail')->name('update-row');
    });
    /*Route::get('/admin/update-row',function(){
        return view('admin.inquiry.update-row');
    })->name('update-row'); */


   /*                     ---                Prospect           ---                   */

    Route::resource('manage-prospect', 'ProspectController');
    Route::get('manage-prospect/{id}/delete', 'ProspectController@delete')->name('prospect-delete');

    Route::get('prospect-detail/{id}', 'ProspectController@getProspectRowDetail')->name('prospect-detail');

    Route::get('admin/update-prospect/{id}', 'ProspectController@getProspectDetail')->name('update-prospect');
    Route::post('admin/prospect-update', 'ProspectController@prospectUpdate')->name('updatProspect');
    Route::post('add-prospect-store', 'ProspectController@store')->name('prospect-store');
    Route::get('/add-prospect',function(){
        return view('admin.prospect.add-prospect');
    })->name('add-prospect');

    //Route::get('add-prospect', 'ProspectController@importForm(')->name('add-prospect');
    Route::post('import-prospect', 'ProspectController@import')->name('import-prospect');
    Route::get('export-prospect-list', 'ProspectController@exportIntoExcel')->name('export-prospect-Excel');


    Route::get('admin/list',function(){
        return view('admin.subscription.list');
    })->name('list_customers');

    Route::get('/update',function(){
        return view('admin.subscription.update');
    })->name('update');


    Route::post('/add-validate','Auth2Controller@store')->name('customer-store2');
    Route::post('/add-payment','Auth2Controller@storePayment')->name('customer-paymentMode2');



    Route::get('/privacy-policy', 'ContentController@getPrivacyPolicy')->name('privacy-policy');
    Route::get('/terms-of-service', 'ContentController@getTermsOfService')->name('terms-of-service');
    Route::get('/legal-notice', 'ContentController@getLegalNotice')->name('legal-notice');
    Route::get('/business-environment/{key?}/{subkey?}', 'ResourceController@getResources')->name('business-environment');
    Route::get('/business-environment2/{key?}/{subkey?}', 'ResourceController@getResources2')->name('business-environment2');

    /*site serach route*/
    Route::any('/search', 'SiteSearchController@search')->name('search');

    //Routes for Business Directory
    Route::get('/business-directory', 'BusinessDirectoryController@index')->name('business-directory');
    Route::get('/business-directory-details', 'BusinessDirectoryController@details')->name('business-directory-details');
    Route::get('/business-directory-company-details/{key}', 'BusinessDirectoryController@companyDetails')->name('business-directory-company-details')->middleware('auth:customer');

    // Routes for contact File
    Route::get('/contact-file', 'ContactFileController@index')->name('contact-file');
    Route::get('/contact-file-estimation', 'ContactFileController@store')->name('contact-file-estimation');
    Route::get('/contact-file-confirm-estimation', 'ContactFileController@confirmEstimation')->name('contact-file-confirm-estimation');
    Route::get('/contact-file-confirm-payment', 'ContactFileController@confirmPayment')->name('contact-file-confirm-payment');
    Route::get('/contact-file-excel-export', 'ContactFileController@exportCompanies')->name('contact-file-excel-export');
    Route::get('download-contact-file/{token?}', 'ContactFileController@downloadContactFile')->name('download-contact-file');
    Route::get('contact-file-payment-success', 'ContactFileController@paymentSuccess')->name('contact-file-payment-success');



    // ---------------Route for Our Services---------
    Route::get('/our-services','OurServicesController@index')->name('our-services');
    // ----------------end here--------------------------------------------

    //--------------Routes for press-review--------------------------------
    Route::get('/press-review','PressReviewController@index')->name('press-review');
    Route::get('/generate','PressReviewController@generate')->name('generate');
    Route::get('/confirm-order','PressReviewController@confirmOrder')->name('confirm-order');
    Route::get('/confirm-estimation','PressReviewController@confirmEstimation')->name('confirm-estimation');
    Route::get('/confirm-payment','PressReviewController@confirmPayment')->name('confirm-payment');
    Route::get('/download-pdf','PressReviewController@downloadPDF')->name('download-pdf')->middleware('auth:customer');
    Route::get('/download/{token?}','PressReviewController@download')->name('download');
    // ----------------end here--------------------------------------------
    Route::get('/download-report/{id}','BusinessIntelligenceController@download')->name('download-report');
    Route::get('/download-sheet/{id}','BusinessIntelligenceController@downloadSheet')->name('download-sheet');

});

