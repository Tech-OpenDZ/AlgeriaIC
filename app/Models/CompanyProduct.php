<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProduct extends Model
{
    //
    /**
     * @var string
     */
    protected $table = 'company_products'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id','product_id']; 


    public function productImages()
    {
        return $this->hasMany(CompanyProductImage::class,'company_product_id');
    } 

    public function productTranslate()
    {
        return $this->hasMany(Product::class,'id','product_id');
    } 
}
