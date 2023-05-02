<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SectorTranslate;
use App\Models\BusinessSector;
use App\Models\EventSector;
use App\Models\BusinessOpportunitySector;


class Sector extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'sectors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','status','display_order','page_key'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translated sector and Sector
    public function localeAll()
    {
        return $this->hasMany(SectorTranslate::class,'sector_id','id');
    }

    // Defining the relation between sector and event sector

    public function businessSector()
    {
        return $this->hasMany(BusinessSector::class,'sector_id');
    }

    public function eventSector()
    {
        return $this->hasMany(EventSector::class,'sector_id');

    }

    //Define relations between subscriptions and news
    public function news()
    {
        return $this->belongsToMany(News::class,'news_sectors');
    }

    public function businessOpportunitySector()
    {
        return $this->hasMany(BusinessOpportunitySector::class, 'sector_id');
    } 

    //Define relations between event and sectors
    public function events()
    {
        return $this->belongsToMany(Event::class,'event_sectors');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_sectors');
    }
}
