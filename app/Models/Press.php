<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PressTranslate;
use Illuminate\Database\Eloquent\SoftDeletes;
class Press extends Model
{
    use SoftDeletes;

    protected $table = 'press';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'press_image','press_link','img_link','publication_date','created_by','updated_by'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(PressTranslate::class,'press_id','id');
    }

}
