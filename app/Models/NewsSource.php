<?php

namespace App\Models;

use App\Models\News;
use App\Models\NewsSourceTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSource extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'news_sources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'updated_by',
        'title',
        'logo'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function news()
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }

    public function localeAll()
    {
        return $this->hasMany(NewsSourceTranslate::class, 'news_source_id', 'id');
    }
}
