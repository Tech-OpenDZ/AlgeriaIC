<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessIntelligenceReportTranslate extends Model
{
    //
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_intelligence_reports_translates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','period','description','report_id','locale'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
