<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessTranslate;
use App\Models\BusinessSector;
use Illuminate\Database\Eloquent\SoftDeletes;
class BusinessMeeting extends Model
{
     use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'business_meetings'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','sector_id', 'start_date','end_date','is_featured','price_per_square_meter']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translate event and event
    public function localeAll()
    {
        return $this->hasMany(BusinessTranslate::class,'business_id','id');
    }

  
    // Defining the relation between business and business sector
    public function businessSector()
    {
        return $this->hasMany(BusinessSector::class,'business_id');
    }
}
