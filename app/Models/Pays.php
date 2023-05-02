<?php

namespace App\Models;
use App\Models\PaysReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pays extends Model
{
	use SoftDeletes;

    protected $table = 'pays';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_pays','fr','en',
    ];



    /**
     * Get the comments for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(PaysReply::class);
    }

}
