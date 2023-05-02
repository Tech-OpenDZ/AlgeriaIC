<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessMeeting,
    App\Models\Sector;
use Illuminate\Database\Eloquent\SoftDeletes;
class BusinessSector extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'business_sectors'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_id', 'sector_id']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between event sector and event 
    public function business() 
    {   
        return $this->belongsTo(BusinessMeeting::class,'business_id');
    }
 
    // Defining the relation between event sector and sector
    public function sector() 
    {   
        return $this->belongsTo(Sector::class,'sector_id');
    }
}
