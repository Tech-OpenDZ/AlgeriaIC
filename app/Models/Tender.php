<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{
    use SoftDeletes;

    protected $table = 'tenders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','publication_date','status', 'deadline'];

    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(TenderTranslate::class,'tender_id','id');
    }
}
