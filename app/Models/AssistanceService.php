<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AssistanceServiceTranslate;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssistanceService extends Model
{
    use SoftDeletes;

    protected $table = 'assistance_services';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'services_image','created_by','updated_by'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(AssistanceServiceTranslate::class,'assistance_id','id');
    }

}
