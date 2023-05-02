<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use PDF;

class GenerateCompanyPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $company;
    private $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company,$filename)
    {
        $this->company       = $company;
        $this->filename      = $filename;
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

        $companies      = $this->company;
        $pdf            = PDF::loadView('frontend.exports.companies',compact('companies'));
        $pdf->setPaper('A3', 'landscape');
        $pdfFile        = $pdf->output();
        $fileName       = $this->filename;
        Storage::put('public/uploads/contact_files/'.$fileName, $pdfFile);
    }
}
