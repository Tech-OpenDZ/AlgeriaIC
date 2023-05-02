<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessIntelligenceReport extends Model
{
    //
    use SoftDeletes;

    protected $table = 'business_intelligence_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','report_id','report', 'status','display_order','customer_id'];

    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(BusinessIntelligenceReportTranslate::class,'report_id','id');
    }
}
