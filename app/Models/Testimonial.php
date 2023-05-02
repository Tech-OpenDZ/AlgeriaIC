<?php

namespace App\Models;

use App\Models\TestimonialTranslate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;

class Testimonial extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'testimonials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'status', 'display_order', 'created_by', 'updated_by'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    // Defining the relation between translated testimonial and testimonial
    public function localeAll()
    {
        return $this->hasMany(TestimonialTranslate::class, 'testimonial_id', 'id');
    }

    // Getting testimonial by id in translated current locale
    public static function locale($id)
    {
        $currentLocale = LaravelLocalization::getCurrentLocale();

        return TestimonialTranslate::where([
            [
                'testimonial_id', $id
            ],
            [
                'locale', $currentLocale
            ]
        ])->first();
    }

    // Defining relation between user and testimonial
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    // Logic to delete all the translations
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($testimonials) {
            foreach ($testimonials->localeAll()->get() as $locale) {
                $locale->delete();
            }
        });
    }
}
