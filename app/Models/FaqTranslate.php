<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqTranslate extends Model
{
	use SoftDeletes;
	
    protected $table = 'faq_translates';

    public function faq(){
    	return $this->belongsTo('App\Models\Faq');
	}

}
