<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessIntelligenceReports as BI_reports,
    App\Models\BusinessIntelligenceReportsTranslate as BI_reports_translate;
use App\Models\AlgeriaBusinessNetwork,
    App\Models\AlgeriaBusinessNetworkTranslate,
    App\User;
use App\Models\Advertisement;
use App\Models\BusinessOpportunity;
use App\Models\BusinessOpportunityTranslate;
use App\Models\BusinessOpportunityDocument;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductTranslate;
use App\Models\ProductImage;
use App\Models\CompanyTranslate;
use App\Models\Contact;
use App\Models\ContactTranslate;
use App\Models\CmsPage;
use App\Models\DiscoverAlgeriaContent,
    App\Models\DiscoverAlgeriaContentTranslate,
    App\Models\DiscoverAlgeriaSubcontent,
    App\Models\DiscoverAlgeriaSubcontentTranslate;
use App\Models\Zone;
use App\Models\Event;
use App\Models\EventTranslate;
use App\Models\Banner;
use App\Models\Sector;
use App\Models\Exhibitor;
use App\Models\ExhibitorTranslate;
use App\Models\Faq;
use App\Models\FaqTranslate;
use App\Models\News;
use App\Models\NewsTranslate;
use App\Models\Resource;
use App\Models\ResourceTranslate;
use LaravelLocalization;
use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->Search ? $request->Search : ($request->search ? $request->search : '' ) ;
        $locale = LaravelLocalization::getCurrentLocale();

        $data = [];
        if($search != null || $search != '') {
      
            $discover_algeria = DiscoverAlgeriaContent::with(['localeAll' => function($q) use ($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use ($locale, $search){
                $query->where('title', 'LIKE', "%{$search}%");
            })->get()->map(function($discover_algeria){

                return [
                    'title' => isset($discover_algeria->localeAll[0]->title) ? $discover_algeria->localeAll[0]->title : 'Discover Algeria',
                    'date' => date('d F,Y',strtotime($discover_algeria->created_at)),
                    'url' => route('discover-algeria',$discover_algeria->content_key),
                    'content' => substr(strip_tags( $discover_algeria->localeAll[0]->title) , 0 ,250)
                ];
            })->toArray();

            $news = News::with(['localeAll' => function($q) use ($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use ($locale, $search){
                $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
            })->get()->map(function($news){
                if($news->is_premium == 1){
                    return [
                        'title' => isset($news->localeAll[0]->title) ? $news->localeAll[0]->title : 'News',
                        'date' => date('d F,Y',strtotime($news->insertion_date)),
                        'url' => route('premium-news-detail',[$news->page_key]),
                        'content' => substr(strip_tags( $news->localeAll[0]->description) , 0 ,250)
                    ];
                }
                else {
                    return [
                        'title' => isset($news->localeAll[0]->title) ? $news->localeAll[0]->title : 'News',
                        'date' => date('d F,Y',strtotime($news->insertion_date)),
                        'url' => route('news-detail',[$news->page_key]),
                        'content' => substr(strip_tags( $news->localeAll[0]->description) , 0 ,250)
                    ];
                }
            })->toArray();
            

            $faq = Faq::with(['localeAll' => function($q) use ($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use($locale, $search){
                $query->where('question', 'LIKE', "%{$search}%")
                ->orWhere('answer', 'LIKE', "%{$search}%");
            })->get()->map(function($faq){

                return [
                    'title' => isset($faq->localeAll[0]->title) ? $faq->localeAll[0]->title : $faq->localeAll[0]->question,
                    'date' => date('d F,Y',strtotime($faq->created_at)),
                    'url' => route('faq'),
                    'content' => substr(strip_tags( $faq->localeAll[0]->answer) , 0 ,250)
                ];
            })->toArray();

            $event = Event::with(['localeAll' => function($q) use($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use($locale, $search){
                $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('place', 'LIKE', "%{$search}%")
                ->orWhere('source', 'LIKE', "%{$search}%");
            })->get()->map(function($event){

                return [
                    'title' => isset($event->localeAll[0]->title) ? $event->localeAll[0]->title : 'Event',
                    'date' => date('d F,Y',strtotime($event->created_at)),
                    'url' => route('event-list'),
                    'content' => substr(strip_tags( $event->localeAll[0]->answer) , 0 ,250)
                ];
            })->toArray();

            // $company = Company::with(['localeAll' => function($q) use($locale){
            //     $q->where('locale', $locale);
            // }])->whereHas('localeAll', function($query) use($locale, $search){
            //     $query->where('company_name', 'LIKE', "%{$search}%")->orWhere('address', 'LIKE', "%{$search}%");
            // })->get()->map(function($company){

            //     return [
            //         'title' => isset($company->localeAll[0]->title) ? $company->localeAll[0]->title : 'Companies',
            //         'date' => date('d F,Y',strtotime($company->created_at)),
            //         'url' => '',
            //         'content' => substr(strip_tags( $company->localeAll[0]->address) , 0 ,250)
            //     ];
            // })->toArray();

            // $product = ProductTranslate::where('name', 'LIKE', "%{$search}%")
            // ->get()->map(function($product){

            //     return [
            //         'title' => isset($product->name) ? $product->name : 'Products',
            //         'date' => date('d F,Y',strtotime($product->created_at)),
            //         'url' => '',
            //         'content' => substr(strip_tags( $product->name) , 0 ,250)
            //     ];
            // })->toArray();


            $businessOpportunity = BusinessOpportunity::with(['localeAll' => function($q) use($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use ($search){
                $query->where('project_title', 'LIKE', "%{$search}%")
                ->orWhere('company_name', 'LIKE', "%{$search}%")
                ->orWhere('company_presentation_text', 'LIKE', "%{$search}%")
                ->orWhere('project_description', 'LIKE', "%{$search}%")
                ->orWhere('contact_person', 'LIKE', "%{$search}%");
            })->get()->map(function($businessOpportunity){

                return [
                    'title' => isset($businessOpportunity->localeAll[0]->title) ? $businessOpportunity->localeAll[0]->title : 'Business Opportunity',
                    'date' => date('d F,Y',strtotime($businessOpportunity->created_at)),
                    'url' => route('business-opportunity'),
                    'content' => substr(strip_tags( $businessOpportunity->localeAll[0]->project_description) , 0 ,250)
                ];
            })->toArray();

            // $algeriaBusinessNetwork = AlgeriaBusinessNetwork::with(['localeAll' => function($q) use($locale){
            //         $q->where('locale', $locale);
            // }])->whereHas('localeAll', function($query) use ($search){
            //     $query->where('description', 'LIKE', "%{$search}%");
            // })->get()->map(function($algeriaBusinessNetwork){

            //     return [
            //         'title' => isset($algeriaBusinessNetwork->localeAll[0]->title) ? $algeriaBusinessNetwork->localeAll[0]->title : 'Business Opportunity',
            //         'date' => date('d F,Y',strtotime($algeriaBusinessNetwork->created_at)),
            //         'url' => '',
            //         'content' => substr(strip_tags( $algeriaBusinessNetwork->localeAll[0]->description) , 0 ,250)
            //     ];
            // })->toArray();


            $resources = Resource::with(['localeAll' => function($q) use($locale){
                $q->where('locale', $locale);
            }])->whereHas('localeAll', function($query) use ($search){
                $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
            })->get()->map(function($resources){

                return [
                    'title' => isset($resources->localeAll[0]->title) ? $resources->localeAll[0]->title : 'Business Opportunity',
                    'date' => date('d F,Y',strtotime($resources->created_at)),
                    'url' => route('business-environment',['key'=>$resources->page_key]),
                    'content' => substr(strip_tags( $resources->localeAll[0]->long_description) , 0 ,250)
                ];
            })->toArray();
            $data =  array_merge($news, $faq, $event, $businessOpportunity,  $resources,$discover_algeria);
        }

        
        // dd($data);
        // dd('paginate',$data);
        $data = $this->paginate($data,5,number_format($request->page));
        
        $page = $data->currentPage();

        if($request->ajax())
        {
            $html = '';
            $has_more = false;
            if($data->hasMorePages())
            $has_more = true;
            $next_page_url = $data->nextPageUrl();
            $ajax = true;
           

            $html .= view('frontend.search_result.result',compact('data','search','page'))->render();
            return response()->json(['success'=>true,'html' => $html,'has_more' => $has_more ,'next_page_url' => $next_page_url],200);
        }

        // $data = $data->toArray();
        // dd($data);
        return view('frontend.search_result.index',compact('data','search','page'));
    }

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($data, $perPage , $page, $options = [])
    {
        
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        // dd($data, $perPage , $page);
        $data = $data instanceof Collection ? $data : Collection::make($data);
        return new LengthAwarePaginator($data->forPage($page, $perPage), $data->count(), $perPage, $page, $options);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
