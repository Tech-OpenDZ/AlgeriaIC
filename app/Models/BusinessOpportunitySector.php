<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BusinessOpportunity,
    App\Models\Sector;

class BusinessOpportunitySector extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_opportunity_sectors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_opportunity_id', 'sector_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between event sector and event 
    public function businessOpportunity()
    {
        return $this->belongsTo(BusinessOpportunity::class, 'business_opportunity_id');
    }

    // Defining the relation between event sector and sector
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
