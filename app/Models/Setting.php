<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SettingTranslate;

class Setting extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'settings'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'key', 'created_by', 'updated_by', 'value', 'status','is_locale','title','value_type']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
    public function localeAll()
    {
        return $this->hasMany(SettingTranslate::class,'setting_id','id');
    }
}
