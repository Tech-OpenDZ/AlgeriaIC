<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessIntelligenceReportsTranslate extends Model
{
    use SoftDeletes;

    protected $table = 'bi_reports_translate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bi_report_id','title','locale', 'description']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
