<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use App\Models\PressReviewRequest,
    App\Models\News;
use LaravelLocalization;
use PDF;

class GenerateFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $request_id;
    private $news_ids;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request_id,$news_ids)
    {
        $this->request_id       = $request_id;
        $this->news_ids         = $news_ids;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '300');

        $currentLocale = LaravelLocalization::getCurrentLocale();
        $news_details =News::with([
            'localeAll' => function($query) use($currentLocale) {
                return $query->where('locale', $currentLocale)
                ->get();
            }
        ])
        ->whereIn('id',$this->news_ids )
        ->get(); 
        $pdf            = PDF::loadView('frontend.press_review.press_review_pdf',compact('news_details'));
        $pdfFile        = $pdf->output();
        $fileName       = "PR".time()."-".$this->request_id.".pdf";
        PressReviewRequest::where('id',$this->request_id)
        ->update([
            'file_path' =>  'storage/pdf/'.$fileName,
        ]); 
        Storage::put('public/pdf/'.$fileName, $pdfFile); 
       
    }
}
