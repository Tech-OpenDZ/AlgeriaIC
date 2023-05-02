<?php

namespace App\Models;
use App\Models\BusinessOpportunityTranslate;
use App\Models\BusinessOpportunityDocument;
use App\Models\BusinessOpportunitySector;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\Zone;


class BusinessOpportunity extends Model
{
    use SoftDeletes;

	protected $table = 'business_opportunities';
   
    protected $fillable = [
        'company_email','company_contact','logo', 'company_presentation_file','image','display_order','activated','sector_id','zone_id', 'reference_no_of_opportunity', 'created_by', 'updated_by', 'page_key'];

    //protected $guarded = ['id'];

    public function localeAll()
    {
        return $this->hasMany(BusinessOpportunityTranslate::class, 'business_opportunity_id', 'id');
    }

    // Defining the relation between Business Opportunity  and Business Opportunity Documents
    public function businessOpportunityDocument()
    {
        return $this->hasMany(BusinessOpportunityDocument::class, 'business_opportunity_id', 'id');
    }

    // Defining the relation between BusinessOpportunity and BusinessOpportunity_sector
    public function businessOpportunitySector()
    {
        return $this->hasMany(BusinessOpportunitySector::class, 'business_opportunity_id');
    }

    // Defining the relation between BusinessOpportunity and BusinessOpportunity_zone
    public function businessOpportunityZone()
    {
        return $this->hasMany(BusinessOpportunityZone::class, 'business_opportunity_id');
    }

    // Defining relation between user and testimonial
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by', 'id');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'business_opportunity_sectors');
    }

    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'business_opportunity_zones');
    }
}
