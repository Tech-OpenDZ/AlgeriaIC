<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscoverAlgeriaContentTranslate extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'discover_algeria_content_translates'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content_id','locale','title']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
