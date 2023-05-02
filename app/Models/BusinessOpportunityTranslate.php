<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessOpportunityTranslate extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'business_opportunity_translates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['business_opportunity_id', 'locale', 'project_title', 'company_name',  'company_email' , 'company_contact' , 'company_presentation_text', 'project_description', 'contact_person' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
