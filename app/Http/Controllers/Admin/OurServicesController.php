<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\OurService;
use App\Models\OurServiceTranslate;
use LaravelLocalization;
class OurServicesController extends Controller
{
    
    public function index(){
    	$services_data = OurService::with('localeAll')->first();
    	if ($services_data!= null) {
    		foreach ($services_data->localeAll as $translate){
    		 switch ($translate->locale) {
                    case 'en':
                        $services_data->services_title_in_english   = $translate->services_title ;
                        $services_data->description_in_english = $translate->services_description;
                        $services_data->i2b_title_in_english   = $translate->i2b_title;
                        $services_data->i2b_description_in_english = $translate->i2b_description;
                        $services_data->subscription_title_in_english = $translate->subscription_title;
                        $services_data->subscription_description_in_english = $translate->subscription_description;
                        $services_data->online_title_in_english = $translate->online_services_title;
                        $services_data->online_description_in_english = $translate->online_services_description;
                        $services_data->advertisement_title_in_english = $translate->advertisement_title;
                        $services_data->advertisement_description_in_english = $translate->advertisement_description;
                        break;
                    case 'ar':
                        $services_data->services_title_in_arabic   = $translate->services_title ;
                        $services_data->description_in_arabic = $translate->services_description;
                        $services_data->i2b_title_in_arabic = $translate->i2b_title;
                        $services_data->i2b_description_in_arabic = $translate->i2b_description;
                        $services_data->subscription_title_in_arabic = $translate->subscription_title;
                        $services_data->subscription_description_in_arabic = $translate->subscription_description;
                        $services_data->online_title_in_arabic = $translate->online_services_title;
                        $services_data->online_description_in_arabic = $translate->online_services_description;
                        $services_data->advertisement_title_in_arabic = $translate->advertisement_title;
                        $services_data->advertisement_description_in_arabic = $translate->advertisement_description;
                        break;
                    case 'fr':
                        $services_data->services_title_in_french   = $translate->services_title ;
                        $services_data->description_in_french = $translate->services_description;
                        $services_data->i2b_title_in_french = $translate->i2b_title;
                        $services_data->i2b_description_in_french = $translate->i2b_description;
                        $services_data->subscription_title_in_french = $translate->subscription_title;
                        $services_data->subscription_description_in_french = $translate->subscription_description;
                        $services_data->online_title_in_french = $translate->online_services_title;
                        $services_data->online_description_in_french = $translate->online_services_description;
                        $services_data->advertisement_title_in_french = $translate->advertisement_title;
                        $services_data->advertisement_description_in_french = $translate->advertisement_description;
                        break;
                }
    		}
    		
    	}
    	// else{
    		
    	// }
    	return view('admin/our_services/create',compact('services_data'));
    }

    public function store(Request $request){
    	$data = $request->all();
    	$validatedData = $request->validate(
            [
                // 'files_in_english'  => 'required',
                // 'files_in_arabic'  => 'required',
                // 'files_in_french'  => 'required',
                'services_title_in_english' => 'required',
                'services_title_in_arabic' => 'required',
                'services_title_in_french' => 'required',
                'description_in_english'    => 'required',
                'description_in_arabic'     => 'required',
                'description_in_french'     => 'required',
                'i2b_title_in_english'      => 'required',
                'i2b_title_in_arabic'       => 'required',
                'i2b_title_in_french'       => 'required',
                'i2b_description_in_english'=> 'required',
                'i2b_description_in_arabic' => 'required',
                'i2b_description_in_french' => 'required',
                'online_title_in_english' => 'required',
                'online_title_in_arabic' => 'required',
                'online_title_in_french' => 'required',
                'online_description_in_english' => 'required',
                'online_description_in_arabic' => 'required',
                'online_description_in_french' => 'required',
                'advertisement_title_in_english' => 'required',
                'advertisement_title_in_arabic' => 'required',
                'advertisement_title_in_french' => 'required',
                'advertisement_description_in_english' => 'required',
                'advertisement_description_in_arabic' => 'required',
                'advertisement_description_in_french' => 'required',
                'subscription_title_in_english' => 'required',
                'subscription_title_in_arabic' => 'required',
                'subscription_title_in_french' => 'required',
                'subscription_description_in_english' => 'required',
                'subscription_description_in_arabic' => 'required',
                'subscription_description_in_french' => 'required',

            ]
        );

        if (!empty($data['services_id'])) {
        		// echo "<pre>";print_r();exit();
	        	DB::beginTransaction();
	        	try {
					$services_data = OurService::findOrFail($data['services_id']);
	        	 	$services_data->created_by = Auth::user()->id;
			        $services_data->updated_by = Auth::user()->id;

			        $result = $services_data->update();

					$upload_path = storage_path('app/public/uploads/services/');

					$fileSaveAsNameEnglish = rand(). "_serivice_files." . $request->files_in_english->getClientOriginalExtension();
					$file_url_for_english = $fileSaveAsNameEnglish;
					$request->files_in_english->move($upload_path, $fileSaveAsNameEnglish);

					$fileSaveAsNameFrench = rand(). "_serivice_files." . $request->files_in_french->getClientOriginalExtension();
					$file_url_for_french = $fileSaveAsNameFrench;
					$request->files_in_french->move($upload_path, $fileSaveAsNameFrench);

					$fileSaveAsNameArabic = rand(). "_serivice_files." . $request->files_in_arabic->getClientOriginalExtension();
					$file_url_for_arabic = $fileSaveAsNameArabic;
					$request->files_in_arabic->move($upload_path, $fileSaveAsNameArabic);
					
					
			        $trans_service = [
		                'en' => [
		                    "services_title"         => $request->services_title_in_english,
		                    "services_description"   => $request->description_in_english,
		                    "i2b_title"         => $request->i2b_title_in_english,
		                    "i2b_description"    => $request->i2b_description_in_english,
		                    "subscription_title" => $request->subscription_title_in_english,
		                    "subscription_description" => $request->subscription_description_in_english,
		                    "online_services_title" =>$request->online_title_in_english,
		                    "online_services_description"=>$request->online_description_in_english,
		                    "advertisement_title" =>$request->advertisement_title_in_english,
		                    "advertisement_description"=>$request->advertisement_description_in_english,
							'files' => $fileSaveAsNameEnglish,
						],
		                'ar' => [
		                    "services_title"         => $request->services_title_in_arabic,
		                    "services_description"   => $request->description_in_arabic,
		                    "i2b_title"         => $request->i2b_title_in_arabic,
		                    "i2b_description"    => $request->i2b_description_in_arabic,
		                    "subscription_title" => $request->subscription_title_in_arabic,
		                    "subscription_description" => $request->subscription_description_in_arabic,
		                    "online_services_title" =>$request->online_title_in_arabic,
		                    "online_services_description"=>$request->online_description_in_arabic,
		                    "advertisement_title" =>$request->advertisement_title_in_arabic,
		                    "advertisement_description"=>$request->advertisement_description_in_arabic,
							'files' => $fileSaveAsNameArabic,
						],
		                'fr' => [
		                    "services_title"         => $request->services_title_in_french,
		                    "services_description"   => $request->description_in_french,
		                    "i2b_title"         => $request->i2b_title_in_french,
		                    "i2b_description"    => $request->i2b_description_in_french,
		                    "subscription_title" => $request->subscription_title_in_french,
		                    "subscription_description" => $request->subscription_description_in_french,
		                    "online_services_title" =>$request->online_title_in_french,
		                    "online_services_description"=>$request->online_description_in_french,
		                    "advertisement_title" =>$request->advertisement_title_in_french,
		                    "advertisement_description"=>$request->advertisement_description_in_french,
							'files' => $fileSaveAsNameFrench,
						],
	            	];

	            	foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
					
	                OurServiceTranslate::where(
	                    [
	                        [
	                            'service_id', '=', $data['services_id']
	                        ],
	                        [
	                            'locale', '=', $localeCode
	                        ]
	                    ])
	                    ->update($trans_service[$localeCode]);
	            	}
	            	if($result) {
					
						
		                DB::commit();
		                return redirect('admin/manage-our-services')->with('success', 'Services updated succsessfully.');
		            }else {
		                DB::rollback();
		                return redirect('admin/manage-our-services')->with('error', 'Something went wrong!');
		            }
	        		
	      		} catch (Exception $e) {
	        		return redirect()->route('manage-our-services.index')->with('error', json_encode($e->getMessage()));
	        	}

        }
        else{
			
	    	$translate_data = [
	            [  	'services_title'        => $request->services_title_in_english,
	                'services_description'  => $request->description_in_english,
	                'i2b_title'        => $request->i2b_title_in_english,
	                'i2b_description'  => $request->i2b_description_in_english,
	                'subscription_title' => $request->subscription_title_in_english,
	                'subscription_description' => $request->subscription_description_in_english,
	                'online_services_title' => $request->online_title_in_english,
	                'online_services_description' => $request->online_description_in_english,
	                'advertisement_title' => $request->advertisement_title_in_english,
	                'advertisement_description' => $request->advertisement_description_in_english,
	                'files' => $request->files_in_english,
	                'locale'            => "en"
	            ],
	            [   'services_title'        => $request->services_title_in_arabic,
	                'services_description'  => $request->description_in_arabic,
	                'i2b_title'        => $request->i2b_title_in_arabic,
	                'i2b_description'  => $request->i2b_description_in_arabic,
	                'subscription_title' => $request->subscription_title_in_arabic,
	                'subscription_description' => $request->subscription_description_in_arabic,
	                'online_services_title' => $request->online_title_in_english,
	                'online_services_description' => $request->online_description_in_arabic,
	                'advertisement_title' => $request->advertisement_title_in_arabic,
	                'advertisement_description' => $request->advertisement_description_in_arabic,
	                'files' => $request->files_in_arabic,
	                'locale'            => "ar"
	            ],
	            [   'services_title'        => $request->services_title_in_french,
	                'services_description'  => $request->description_in_french,
	                'i2b_title'        => $request->i2b_title_in_french,
	                'i2b_description'  => $request->i2b_description_in_french,
	                'subscription_title' => $request->subscription_title_in_french,
	                'subscription_description' => $request->subscription_description_in_french,
	                'online_services_title' => $request->online_title_in_french,
	                'online_services_description' => $request->online_description_in_french,
	                'advertisement_title' => $request->advertisement_title_in_french,
	                'advertisement_description' => $request->advertisement_description_in_french,
	                'files' => $request->files_in_french,
	                'locale'            => "fr"
	            ],
	        ];
	        // echo "<pre>";print_r($translate_data);exit();
	        DB::beginTransaction();
	        try{
		        $services = new OurService();
		        $services->created_by = Auth::user()->id;
		        $services->updated_by = Auth::user()->id;
		        $result = $services->save();
		        foreach($translate_data as $key => $value) {
		        	$service_tanslation = new OurServiceTranslate();

		        	$uploadFile = $value['files'];
		            $fileSaveAsName = rand(). "_serivice_files." . $uploadFile->getClientOriginalExtension();
		            $upload_path = storage_path('app/public/uploads/services/');
		            $file_url = $fileSaveAsName;
		            $success = $uploadFile->move($upload_path, $fileSaveAsName);
		            $service_tanslation->files     = $fileSaveAsName;
		            $service_tanslation->services_title = $value['services_title'];
		            $service_tanslation->services_description = $value['services_description'];
		            $service_tanslation->i2b_title = $value['i2b_title'];
		            $service_tanslation->i2b_description = $value['i2b_description'];
		            $service_tanslation->subscription_title = $value['subscription_title'];
		            $service_tanslation->subscription_description = $value['subscription_description'];
		            $service_tanslation->online_services_title = $value['online_services_title'];
		            $service_tanslation->online_services_description = $value['online_services_description'];
		            $service_tanslation->advertisement_title = $value['advertisement_title'];
		            $service_tanslation->advertisement_description = $value['advertisement_description'];
		            $service_tanslation->service_id = $services->id;
		            $service_tanslation->locale = $value['locale'];
		            $service_tanslation->save();
		 			        
				}
				if($result) {
					dd(1);
		                DB::commit();
		                return redirect()->back()->with('success', 'Services added succsessfully.');
		            }else {
					dd(1);

		                DB::rollback();
		                return redirect('admin/manage-our-services')->with('error', 'Something went wrong!');
		            }
	        }
	        catch(\Exception $e) {
				dd(3);

	            DB::rollback();
	            return redirect('admin/manage-our-services')->with('error', json_encode($e->getMessage()));
	        }
	   }
		
	   
    }
}
