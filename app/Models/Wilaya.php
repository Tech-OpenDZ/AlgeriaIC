<?php

namespace App\Models;
use App\Models\WilayaReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wilaya extends Model
{
	use SoftDeletes;

    protected $table = 'wilaya';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_wilaya','fr','en',
    ];



    /**
     * Get the comments for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(WilayaReply::class);
    }

}
