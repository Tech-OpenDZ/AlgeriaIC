<?php

namespace App\Models;

use App\Models\Service;
use LaravelLocalization;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategoryTranslate;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'service_categories';

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


    // Defining the relation between translated service_categories and service_categories
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }


    // Defining the relation between translated service_categories and service_categories
    public function localeAll()
    {
        return $this->hasMany(ServiceCategoryTranslate::class, 'category_id', 'id');
    }

    // Getting service_category by id in translated current locale
    public static function locale($id)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        return ServiceCategoryTranslate::where([
            [
                'category_id', $id
            ],
            [
                'locale', $currentLocale
            ]
        ])->first();
    }

    // Defining relation between user and service_category
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    // Logic to delete all the service_categories
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($service_categories) {
            foreach ($service_categories->localeAll()->get() as $locale) {
                $locale->delete();
            }
        });
    }
}
