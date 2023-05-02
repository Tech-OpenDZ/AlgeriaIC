<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EventTranslate,
    App\Models\EventReference,
    App\Models\EventImage,
    App\Models\Exhibitor,
    App\Models\EventDocument;

class Event extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','sector_id', 'start_date','end_date','old_start_date','old_end_date','old_zone','is_featured','is_actif','status','price_per_square_meter'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translate event and event
    public function localeAll()
    {
        return $this->hasMany(EventTranslate::class,'event_id','id');
    }

    // Defining the relation between event and event image
    public function eventImage()
    {
        return $this->hasMany(EventImage::class,'event_id','id');
    }

    // Defining the relation between event and event references
    public function eventReference()
    {
        return $this->hasMany(EventReference::class,'event_id','id');
    }

    // Defining the relation between event and event sector
    public function eventSector()
    {
        return $this->hasMany(EventSector::class,'event_id');
    }

    // Defining the relation between event and event sector
    public function eventExhibitor()
    {
        return $this->hasMany(Exhibitor::class,'event_id');
    }

    // Defining the relation between event and event zones
    public function zones()
    {
        return $this->belongsToMany(Zone::class,'event_zones');
    }

    // Defining the relation between event and event sectors
    public function sectors()
    {
        return $this->belongsToMany(Sector::class,'event_sectors');
    }

    // Defining the relation between content and document
    public function document() 
    {   
        return $this->hasMany(EventDocument::class,'event_id','id');
    }

}
