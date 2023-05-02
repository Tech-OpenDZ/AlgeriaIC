<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Event,
    App\Models\Sector;

class EventSector extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'event_sectors'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['event_id', 'sector_id']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between event sector and event 
    public function event() 
    {   
        return $this->belongsTo(Event::class,'event_id');
    }
 
    // Defining the relation between event sector and sector
    public function sector() 
    {   
        return $this->belongsTo(Sector::class,'sector_id');
    }
}
