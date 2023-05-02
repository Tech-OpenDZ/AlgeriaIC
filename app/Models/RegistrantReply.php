<?php

namespace App\Models;
use App\Models\Registrant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RegistrantReply extends Model
{
    //

    use SoftDeletes;

    protected $table = 'registrant_replay';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registrant_id','reply','reply_by'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function registrant()
    {
        return $this->belongsTo(Registrant::class);
    }
}
