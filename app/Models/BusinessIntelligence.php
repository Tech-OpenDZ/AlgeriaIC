<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BusinessIntelligenceTranslate;
class BusinessIntelligence extends Model
{
     use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_intelligences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','display_order','status'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(BusinessIntelligenceTranslate::class,'b_intelligence_id','id');
    }
}
