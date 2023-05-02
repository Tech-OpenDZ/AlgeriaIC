<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductImage;
class Product extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'products'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(ProductTranslate::class,'product_id','id');
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
