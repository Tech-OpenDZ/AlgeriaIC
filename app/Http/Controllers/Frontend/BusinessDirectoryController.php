<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Zone;
use LaravelLocalization;
use App\Models\Company;
use App\Models\CompanyTranslate;
use Carbon\Carbon;
use Auth;
class BusinessDirectoryController extends Controller
{
    public function index()
    {
        $sidebar_key = 'business_directory';
        return view('frontend.business_directory.index',compact('sidebar_key'));
    }

    public function details(Request $request)
    {
        // $user = Auth::guard('customer')->user();
        // if (!$user->can('has-permission', ['business_directory_company_profile', $user])) {
        //     return redirect('upgrade-plan');
        // }
        $currentLocale = LaravelLocalization::getCurrentLocale();

        // keyword search
        $company = Company::whereHas(
            'localeAll',
            function ($query) use ($currentLocale, $request) {

                if ($request->has('keyword') && !empty($request->get('keyword'))) {
                    return $query->where('locale', $currentLocale)
                        ->where(function ($innerQuery) use ($request) {
                            $innerQuery->where('company_name', 'LIKE', '%' . $request->get('keyword') . '%');
                        });
                } else {
                    return $query->where('locale', $currentLocale);
                }
            }
        )
        ->whereHas(
            'sectors',
            function ($query) use ($currentLocale, $request) {
                if ($request->has('sector') && !empty($request->get('sector'))) {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ])
                        ->where('id', $request->get('sector'));
                } else {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
                }
            }
        )
        ->whereHas(
            'zones',
            function ($query) use ($currentLocale, $request) {
                if ($request->has('zone') && !empty($request->get('zone'))) {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ])
                        ->where('id', $request->get('zone'));
                } else {
                    return $query->with([
                        'localeAll' => function ($query) use ($currentLocale) {
                            return $query->where('locale', $currentLocale);
                        }
                    ]);
                }
            }
        )
        ->with([
            'localeAll' => function ($query) use ($currentLocale, $request) {
                return $query->where('locale', $currentLocale)
                    ->get();
            },
            'sectors' => function ($query) use ($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    }
                ])
                    ->get();
            },
            'zones' => function ($query) use ($currentLocale, $request) {
                return $query->with([
                    'localeAll' => function ($query) use ($currentLocale) {
                        return $query->where('locale', $currentLocale)
                            ->get();
                    }
                ])
                    ->get();
            },
        ])->where('status', 1)
        ->where('is_approved', 1);
        
        if ($request->has('capital_start') && !empty($request->get('capital_start')) ) {

            $capital_start = (int)$request->get('capital_start');
            $company = $company->where('capital', '>=', $capital_start);

        }
        if ( $request->has('capital_end') && !empty($request->get('capital_end'))) {

            $capital_end = (int)$request->get('capital_end');
            $company = $company->where('capital', '<=', $capital_end);
        }
        if ($request->has('turn_over_start') && !empty($request->get('turn_over_start'))) {

            $turn_over_start = (int)$request->get('turn_over_start');
            $company = $company->where('net_sales_2018', '>=', $turn_over_start)
            ->orWhere('net_sales_2019', '>=', $turn_over_start);

        }
        if ($request->has('turn_over_end') && !empty($request->get('turn_over_end'))) {

            $turn_over_end = (int)$request->get('turn_over_end');
            $company = $company->where('net_sales_2018', '<=', $turn_over_end)
            ->orWhere('net_sales_2019', '<=', $turn_over_end);
        }
        if ($request->has('staff_start') && !empty($request->get('staff_start')) ) {

            $staff_start = (int)$request->get('staff_start');
            $company = $company->where('staff', '>=', $staff_start);

        }
        if ( $request->has('staff_end') && !empty($request->get('staff_end'))) {

            $staff_end = (int)$request->get('staff_end');
            $company = $company->where('staff', '<=', $staff_end);

        }
        if ($request->has('creation_date_start') && !empty($request->get('creation_date_start'))) {

            $creation_date_start = strtotime($request->get('creation_date_start'));
            $creation_date_start = date('Y-m-d',$creation_date_start);
            $company = $company->whereDate('creation_date', '>=', $creation_date_start);
        }
        if ($request->has('creation_date_end') && !empty($request->get('creation_date_end'))) {

            $creation_date_end = strtotime($request->get('creation_date_end'));
            $creation_date_end = date('Y-m-d', $creation_date_end);
            $company = $company->whereDate('creation_date', '<=', $creation_date_end);

        }

        $company = $company->simplePaginate(5);
        $page = ($request->has('page') && !empty($request->get('page'))) ? $request->get('page') : 1;
        if ($page == 1 || !$company->isEmpty()) {
            $nextComapny = view('frontend.business_directory.company_next_page_data', compact('company', 'page'))->render();
        } else {
            $nextComapny = "";
        }

       // return $nextComapny;

        // ---------Comapny data-----------
        $company_count = Company::where('status', 1)->where('is_approved', 1)->whereHas(
            'localeAll',
            function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale);
            }
        )->count();

        // ---------- company data end-----------

        // fetching data for filters
        $sectors = Sector::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
            ->where('status', 1)
            ->get();

        $zones = Zone::with([
            'localeAll' => function ($query) use ($currentLocale) {
                return $query->where('locale', $currentLocale)
                    ->get();
            }
        ])
            ->where('status', 1)
            ->get();

        return view(
            'frontend.business_directory.details',
            compact(
                'nextComapny',
                'sectors',
                'zones',
                'company_count',
                'company'
            )
        );

    }

    public function companyDetails(Request $request)
    {
        
            $user = Auth::guard('customer')->user();
            if(!$user->can('has-permission', ['business_directory_company_profile', $user])) { 
                return redirect('upgrade-plan');
            }
            $currentLocale = LaravelLocalization::getCurrentLocale();
            $company = Company::with([
                'localeAll',
                'products',
                'products.productTranslate', 
                'products.productTranslate.localeAll' => function($query) use($currentLocale) {
                    return $query->where('locale', $currentLocale)
                    ->get();
                },
                'products.productImages',
                'contacts',
                'contacts.localeAll'
            ])
            ->where('page_key',$request->key)
            ->first();

            if($company == null) {
                abort(404);
            }
            return view('frontend.business_directory.company_details',compact('company'));
             
        // dd($company);
    }
}
