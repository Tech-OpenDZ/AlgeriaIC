<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    const location = [
        'top-header' => 'Top Header',
        'sidebar-top' => 'Sidebar Top',
        'sidebar-bottom' => 'Sidebar Bottom',
    ];

    const advertisement_type = [
        'permanent' => 'Permanent',
        'temporary' => 'Temporary',
    ];

    const formula_type = [
        // ''=>'--select--',
        'date' => 'By Date',
        // 'keyword' => 'By Keyword',
        'clicks' => 'By number of clicks',
        'displays' => 'By number of displays',
    ];

    const for_keyword = [
        // ''=>'--select--',
        'clicks' => 'By number of clicks',
        'displays' => 'By number of displays',
    ];



    public function scopeActive()
    {
        return $this->where('status',1);
    }

    public function pages()
    {
        return $this->hasMany(AdvertisementPages::class,'ad_id','ad_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

}
