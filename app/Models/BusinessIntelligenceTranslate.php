<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessIntelligenceTranslate;
use Illuminate\Database\Eloquent\SoftDeletes;
class BusinessIntelligenceTranslate extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'business_intelligence_translates'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','b_intelligence_id','locale','description']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
