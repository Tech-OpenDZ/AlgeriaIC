<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ContactTranslate;
class Contact extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'contacts'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'email','mobile_number']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(ContactTranslate::class,'contact_id','id');
    }
}
