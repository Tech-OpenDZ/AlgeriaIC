<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Commercial extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'commercial_qoutes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['created_by', 'updated_by','base','devis' ,'cours_achat' ,'cours_vente','status','display_order'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
