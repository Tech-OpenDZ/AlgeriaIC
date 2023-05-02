<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BannerImage;
use App\Models\BannerTranslate;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = 'banner';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','key','created_by','updated_by'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function bannerImages(){
        return $this->hasMany(BannerImage::class);
    }

   
}
