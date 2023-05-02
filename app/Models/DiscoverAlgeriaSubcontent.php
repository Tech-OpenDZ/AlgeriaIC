<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\DiscoverAlgeriaContent,
    App\Models\DiscoverAlgeriaDocuments;


class DiscoverAlgeriaSubcontent extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'discover_algeria_subcontents'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by','updated_by','status','display_order','content_id']; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // Defining the relation between translated discover_algeria_content and discover_algeria_content
    public function localeAll()
    {
        return $this->hasMany(DiscoverAlgeriaSubcontentTranslate::class,'subcontent_id','id');
    } 

    // Defining the relation between content and sub content
    public function content() 
    {   
        return $this->belongsTo(DiscoverAlgeriaContent::class,'content_id');
    }

    // Defining the relation between content and document
    public function document() 
    {   
        return $this->hasMany(DiscoverAlgeriaDocuments::class,'subcontent_id','id');
    }


}
