<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessIntelligenceReports extends Model
{
    use SoftDeletes;

    protected $table = 'bussiness_intelligence_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','image', 'status'];

    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(BusinessIntelligenceReportsTranslate::class,'bi_report_id','id');
    }
}
