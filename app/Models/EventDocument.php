<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDocument extends Model
{
    
    /**
     * @var string
     */
    protected $table = 'event_documents'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['event_id','document_name','document']; 

}