<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BusinessOpportunity,
    App\Models\Zone;

class BusinessOpportunityZone extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_opportunity_zones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_opportunity_id', 'zone_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between event zone and event 
    public function businessOpportunity()
    {
        return $this->belongsTo(BusinessOpportunity::class, 'business_opportunity_id');
    }

    // Defining the relation between event zone and zone
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
