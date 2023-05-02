<?php

namespace App\Models;

use App\Models\News;
use App\Models\Event;
use App\Models\ZoneTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'zones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','status','display_order'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translated sector and Sector
    public function localeAll()
    {
        return $this->hasMany(ZoneTranslate::class,'zone_id','id');
    }


    //Define relations between subscriptions and news
    public function news()
    {
        return $this->belongsToMany(News::class,'news_zones');
    } 

    //Define relations between subscriptions and news
    public function events()
    {
        return $this->belongsToMany(Event::class,'event_zones');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_zones');
    }

}
