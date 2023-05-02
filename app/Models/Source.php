<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SourceTranslate;

class Source extends Model
{
    use SoftDeletes;
    
    /**
     * @var string
     */
    protected $table = 'sources'; 

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

    // Defining the relation between translated source and Source
    public function localeAll()
    {
        return $this->hasMany(SourceTranslate::class,'source_id','id');
    }
}
