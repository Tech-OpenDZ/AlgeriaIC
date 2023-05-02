<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EconomicTranslate;
class Economic extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'economic_indicators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','value','date','display_order','status'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(EconomicTranslate::class,'economic_id','id');
    }
}
