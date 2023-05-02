<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SectorTranslate extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'sector_translates'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sector_id','locale','name']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
