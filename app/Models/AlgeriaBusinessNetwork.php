<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AlgeriaBusinessNetworkTranslate;

class AlgeriaBusinessNetwork extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'algeria_business_network'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','image_top','image_bottom_top','image_bottom_two','image_bottom_three','image_bottom_four']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translated discover_algeria_content and discover_algeria_content
    public function localeAll()
    {
        return $this->hasMany(AlgeriaBusinessNetworkTranslate::class,'network_id','id');
    }
}
