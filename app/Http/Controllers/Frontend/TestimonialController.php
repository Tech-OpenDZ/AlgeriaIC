<?php
 
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialTranslate;
use DB;
use LaravelLocalization;

class TestimonialController extends Controller
{
    /**
     * Display list of testimonial
     * Initially first 6 testimonials are displayed.
     * If more than 6 - view more button is activated - which displays 2 more testimonials on each click.
     */
    public function index()
    {
        //Get current locale
        $locale = LaravelLocalization::getCurrentLocale();
        //get total testimonials
        $total_testimonials = Testimonial::select('id', 'image')->where('status',1)
            ->orderBy('display_order','asc')
            ->orderBy('created_at', 'asc')
            ->with(['localeAll' => function($w) use($locale){
                return $w->where('locale', $locale)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();

        //get first 6 testimonials to display
        $testimonials = Testimonial::select('id', 'image')->where('status',1)
            ->orderBy('display_order','asc')
            ->orderBy('created_at', 'asc')
            ->limit(10)
            ->with(['localeAll' => function($w) use($locale){
                return $w->where('locale', $locale)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();

        $data = ['testimonials' => $testimonials, 'total_testimonials' => count($total_testimonials)];
        $sidebar_key = 'testimonials';
        return view('frontend.testimonial.index',compact('sidebar_key'))->with('data',$data);
    }

    /**
     * Load more testimonials if total tetsimonials are more than 6
     * Append 2 testiminials if exists - to the existing list
     */
    public function loadMoreData(Request $request)
    {
       
        $locale = LaravelLocalization::getCurrentLocale();
        $output = '';
        $id = $request->id;
       
        //Get testimonials to append on "view more" button click
        $testimonials = Testimonial::select('id', 'image')->where('id','>',$id)
            ->orderBy('display_order','asc')
            ->orderBy('created_at', 'asc')
            ->limit(4)
            ->with(['localeAll' => function($w) use($locale){
                return $w->where('locale', $locale)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();
        if(!$testimonials->isEmpty()){
            $output .= '<div class="row">';
            foreach($testimonials as $data){
                $testimonial_id = $data->id;
                $data->image = isset($data->image)? $data->image :'default-image.png';
                foreach($data->localeAll as $testimonial){                   
                    $description = html_entity_decode(strip_tags(str_limit($testimonial->description, 165, '....')));
                    $name = $testimonial->name;
                    $title = $testimonial->sub_title;
                    $output .=  ' <div class="col-md-6 col-sm-6 col-xs-12 no-left-padding">
                                    <div class="testimonial-area__elements--box mt-4">
                                        <div class="quote-font  pb-3">
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                        <p class="testimonial-content">
                                        '.$description.' 

                                        <a type="button" class="modal-read-more" data-toggle="modal" data-target="#myModal" data-id="'.$testimonial_id.'">
                                            read more
                                        </a>
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                            </div>
                                        </div> 
                                        </p>
                                        <div class="authour-detail">
                                        <div class="authour-detail__left">
                                            <img src='.asset('storage/uploads/testimonial/'.$data->image).' alt="authour" class="img-fluid">
                                        </div>
                                            <div class="authour-detail__right">
                                                <strong><p class="authour-name">'.$name.'</p></strong>
                                                <p>'.$title.'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                }
            }
            $output .= '</div>';
            if($locale == 'ar') {
                $output .= '<div id="remove-row" class="text-center"><a href="javascript:void(0);" id="btn-more" data-id="'.$testimonial_id.'" class="register button-center loadmore-btn">عرض المزيد</a></div>';
            } else if($locale == 'fr') {
                $output .= '<div id="remove-row" class="text-center"><a href="javascript:void(0);" id="btn-more" data-id="'.$testimonial_id.'" class="register button-center loadmore-btn">VOIR PLUS</a></div>';
            } else {
                $output .= '<div id="remove-row" class="text-center"><a href="javascript:void(0);" id="btn-more" data-id="'.$testimonial_id.'" class="register button-center loadmore-btn">VIEW more</a></div>';
            }
            echo $output;
        }
    }

    public function readMoreData(Request $request) 
    {
    	$id = $request['id'];
    	
    	$currentLocale = LaravelLocalization::getCurrentLocale();
    	$testimonials = Testimonial::select('id', 'image')->where('id',$id)
    		->where('status',1)
            ->orderBy('display_order','asc')
            ->orderBy('created_at', 'asc')
            ->limit(3)
            ->with(['localeAll' => function($w) use($currentLocale,$id){
                return $w->where('locale', $currentLocale)->where('testimonial_id',$id)->select('testimonial_id','name','sub_title', 'description')->get();
        }])->get();

        return view('frontend.testimonial.readmoredata',compact('testimonials'));

    }
}
