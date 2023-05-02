<?php

namespace App\Models;
use App\Models\FaqTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{

	use SoftDeletes;

	protected $table = 'faqs';
   
    protected $fillable = [
        'question', 'answer','display_order'
       ];

    // Defining the relation between translated testimonial and testimonial
    public function localeAll()
    {
        return $this->hasMany(FaqTranslate::class, 'faq_id', 'id');
    }
	
}
