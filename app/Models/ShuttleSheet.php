<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShuttleSheet extends Model
{
    
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'table_shuttle_sheets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['style_sheet', 'status','created_by', 'updated_by'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
