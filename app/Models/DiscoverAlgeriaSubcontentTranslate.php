<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscoverAlgeriaSubcontentTranslate extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'discover_algeria_subcontent_translates'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subcontent_id','locale','sub_content_title','sub_content_description']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
