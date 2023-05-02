<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProductImage extends Model
{
    //
    /**
     * @var string
     */
    protected $table = 'company_product_images'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_product_id','image']; 
}
