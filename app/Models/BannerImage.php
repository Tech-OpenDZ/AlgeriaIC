<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Banner;
use App\Models\BannerTranslate;
class BannerImage extends Model
{
    use SoftDeletes;

    protected $table = 'banner_images';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner_img','banner_id','status','link','display_order','created_by','updated_by'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function banners(){
    	return $this->belongsTo(Banner::class);
    }

     public function localeAll()
    {
        return $this->hasMany(BannerTranslate::class,'banner_image_id','id');
    }
}
