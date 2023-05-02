<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PartnerTranslate;

class Partner extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'partners'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['logo', 'status', 'created_by', 'updated_by']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    public function localeAll()
    {
        return $this->hasMany(PartnerTranslate::class,'partner_id','id');
    }

}
