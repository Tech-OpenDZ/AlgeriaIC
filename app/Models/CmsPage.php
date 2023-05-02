<?php

namespace App\Models;

use App\Models\CmsPageTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;

class CmsPage extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'cms_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'display_order', 'created_by', 'updated_by'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // Defining the relation between translated cms_pages and cms_page
    public function localeAll()
    {
        return $this->hasMany(CmsPageTranslate::class, 'cms_page_id', 'id');
    }

    // Getting cms_page by id in translated current locale
    public static function locale($id)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        return CmsPageTranslate::where([
            [
                'cms_page_id', $id
            ],
            [
                'locale', $currentLocale
            ]
        ])->first();
    }

    // Defining relation between user and cms_page
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    // Logic to delete all the cms_pages
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($cms_pages) {
            foreach ($cms_pages->localeAll()->get() as $locale) {
                $locale->delete();
            }
        });
    }
}
