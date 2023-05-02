<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DiscoverAlgeriaDocuments extends Model
{
    
    /**
     * @var string
     */
    protected $table = 'discover_algeria_subcontent_documents'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subcontent_id','document_name','document']; 

}
