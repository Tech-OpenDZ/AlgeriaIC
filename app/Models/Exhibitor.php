<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ExhibitorTranslate;

class Exhibitor extends Model
{
    /**
     * @var string
     */
    protected $table = 'event_exhibitors'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','event_id', 'exhibitors_logo','email_address','contact','status','display_order']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translate event and event
    public function localeAll()
    {
        return $this->hasMany(ExhibitorTranslate::class,'exhibitor_id','id');
    }


}
