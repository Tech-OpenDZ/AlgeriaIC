<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OurServiceTranslate;

class OurService extends Model
{
     use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'our_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'updated_by'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];



    public function localeAll()
    {
        return $this->hasMany(OurServiceTranslate::class,'service_id','id');
    }

}
