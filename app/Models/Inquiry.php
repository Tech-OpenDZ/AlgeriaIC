<?php

namespace App\Models;
use App\Models\InquiryReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inquiry extends Model
{
	use SoftDeletes;

    protected $table = 'inquiries';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','email','company','job_title','phone_number','subject','message','note_inquiry','reply','replied_by','status'
    ];



    /**
     * Get the comments for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(InquiryReply::class);
    }

}
