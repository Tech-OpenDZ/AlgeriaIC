<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ResourceTranslate;
use App\Models\ResourceDocuments;


class Resource extends Model
{

    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'created_by', 
            'updated_by', 
            'status', 
            'display_order', 
            'link', 
            'logo', 
            'page_type', 
            'page_key', 
            'is_page',
            'parent_id'
        ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    const page_type = [
        '0'  => 'select',
        '1' => 'Box page',
        '2' => 'List page',
        '3' => 'Tab page',
    ]; 

    // Defining the relation between translated resource and resource
    public function localeAll()
    {
        return $this->hasMany(ResourceTranslate::class,'resource_id','id');
    } 

    


       // Defining the relation between Business Opportunity  and Business Opportunity Documents
     
    // Defining the relation between translated resource and resource sub pages
    public function subPages()
    {
        return $this->hasMany(Resource::class,'parent_id','id');
    } 

    // Defining the relation between parent resource and resource
    public function parent()
    {
        return $this->belongsTo(Resource::class,'parent_id','id');
    } 

}
