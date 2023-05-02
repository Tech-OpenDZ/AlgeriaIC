<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Statistics extends Model
{
    use SoftDeletes;


    protected $table = 'stats_visites';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip','date_visite','pages_vues','pays','created_at'
    ];



    /**
     * Get the comments for the blog post.
     */
   

}

