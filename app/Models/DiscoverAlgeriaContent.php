<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\DiscoverAlgeriaContentTranslate,
    App\Models\DiscoverAlgeriaSubcontent;


class DiscoverAlgeriaContent extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'discover_algeria_contents'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','status','display_order']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translated discover_algeria_content and discover_algeria_content
    public function localeAll()
    {
        return $this->hasMany(DiscoverAlgeriaContentTranslate::class,'content_id','id');
    }
    
    // Defining the relation between translated discover_algeria_content and discover_algeria_content
    public function subContents()
    {
        return $this->hasMany(DiscoverAlgeriaSubcontent::class,'content_id','id');
    } 
}
