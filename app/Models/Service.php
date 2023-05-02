<?php

namespace App\Models;

use LaravelLocalization;
use App\Models\ServiceTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'display_order', 'created_by', 'updated_by', 'category_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // Defining the relation between translated services and service
    public function localeAll()
    {
        return $this->hasMany(ServiceTranslate::class, 'service_id', 'id');
    }

    // Getting service by id in translated current locale
    public static function locale($id)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        return ServiceTranslate::where([
            [
                'service_id', $id
            ],
            [
                'locale', $currentLocale
            ]
        ])->first();
    }

    // Defining relation between user and service
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    // Logic to delete all the services
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($services) {
            foreach ($services->localeAll()->get() as $locale) {
                $locale->delete();
            }
        });
    }
}
