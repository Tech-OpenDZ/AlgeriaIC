<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Sector;
use App\Models\NewsImage;
use App\Models\NewsSource;
use App\Models\NewsTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'insertion_date',
        'is_premium',
        'status',
        'display_order'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(NewsTranslate::class, 'news_id', 'id');
    }

    public function newsImages()
    {
        return $this->hasMany(NewsImage::class, 'news_id', 'id');
    }

    public function newsSource()
    {
        return $this->hasOne(NewsSource::class, 'id', 'source_id');
    }

    // Define relation between zones and news
    public function zones()
    {
        return $this->belongsToMany(Zone::class,'news_zones');
    }

    // Define relation between sectors and news
    public function sectors()
    {
        return $this->belongsToMany(Sector::class,'news_sectors');
    }

    // Logic to delete all the translations
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($news) {
            foreach ($news->newsImages()->get() as $newsImage) {
                $newsImage->delete();
            }
            foreach ($news->localeAll()->get() as $locale) {
                $locale->delete();
            }
            foreach ($news->zones()->get() as $zone) {
                $zone->delete();
            }
            foreach ($news->sectors()->get() as $sector) {
                $sector->delete();
            }
        });
    }
}
