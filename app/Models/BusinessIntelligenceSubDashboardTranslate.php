<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessIntelligenceSubDashboardTranslate extends Model
{
    //
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'bi_sub_dashboard_translates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','period','description','dashboard_id','locale'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
}
