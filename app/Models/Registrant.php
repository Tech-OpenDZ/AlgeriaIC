<?php

namespace App\Models;
use App\Models\RegistrantReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Registrant extends Model
{
	use SoftDeletes;

    protected $table = 'events_registrants';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','email','company','job_title','phone_number','message','note_events','reply','replied_by'
    ];



    /**
     * Get the comments for the blog post.
     */
    public function replies()
    {
        return $this->hasMany(RegistrantReply::class);
    }

}
