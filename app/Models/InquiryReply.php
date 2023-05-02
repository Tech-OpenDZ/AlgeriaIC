<?php

namespace App\Models;
use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InquiryReply extends Model
{
    //

    use SoftDeletes;

    protected $table = 'inquiry_reply';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inquiry_id','reply','reply_by'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
