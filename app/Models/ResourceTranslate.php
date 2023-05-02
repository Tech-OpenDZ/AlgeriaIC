<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceTranslate extends Model
{
    

    /**
     * @var string
     */
    protected $table = 'resource_translates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'resource_id', 'locale', 'title',  'logo' , 'short_description' , 'description'];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}

