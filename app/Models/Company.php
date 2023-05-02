<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CompanyTranslate;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Zone;
use App\Models\Sector;
use App\Models\ActivityCode;
class Company extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'companies'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','customer_id', 'company_logo','creation_date','telephone','email','fax','website','facebook','youtube','instagram','twitter','linkdeln','capital','staff','net_sales_2018','net_sales_2019','terms_accepted','accept_marketing_offers','is_approved','status','is_featured','is_sponsored','page_key']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // const array for sponsored ratings
    const sponsored_rating = [
        '0' => 'select',
        '1' => 'One',
        '2' => 'Two',
        '3' => 'Three',
        '4' => 'Four',
        '5' => 'Five',
    ]; 

    // Defining the relation between translate company and translate
    public function localeAll()
    {
        return $this->hasMany(CompanyTranslate::class,'company_id','id');
    }

    // Defining the relation between event and event sector
    // public function products()
    // {
    //     return $this->hasMany(Product::class,'company_id');
    // }

    public function products()
    {
        return $this->hasMany(CompanyProduct::class,'company_id','id');
    } 

    // public function productImages()
    // {
    //     return $this->hasmany(Product::class,'company_products');
    // } 
    
     public function contacts()
    {
        return $this->hasMany(Contact::class,'company_id');
    }

    // Define relation between zones and company
    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'company_zones');
    }

    // Define relation between sectors and company
    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'company_sectors');
    }

    public function activity_codes()
    {
        return $this->belongsToMany(ActivityCode::class, 'company_activity_codes');
    }
}
