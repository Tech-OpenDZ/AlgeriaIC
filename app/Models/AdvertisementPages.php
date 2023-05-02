<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertisementPages extends Model
{
    protected $fillable = ['ad_id','page'];

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class,'ad_id','ad_id');
    }
}
