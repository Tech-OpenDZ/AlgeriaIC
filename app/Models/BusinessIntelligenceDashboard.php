<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;

class BusinessIntelligenceDashboard extends Model
{
    //
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_intelligence_main_dashboard';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'status', 'display_order', 'created_by', 'updated_by'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // Defining the relation between translated table and base table
    public function localeAll()
    {
        return $this->hasMany(BusinessIntelligenceDashboardTranslate::class, 'dashboard_id', 'id');
    }

}
