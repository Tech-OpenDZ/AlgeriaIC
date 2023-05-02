<?php
namespace App\Services;

use App\Models\News;
use App\Models\BusinessOpportunity;
use App\Models\Event;
use App\Models\Resource;
use App\Models\CmsPage;
use App\Models\Sector;
use App\Models\DiscoverAlgeriaContent;

use App\Models\Company;
class Slug
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function createSlug($model,$title, $id = 0)
    {
        $title = substr($title,0,80);
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($model,$slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('page_key', $slug) && ! $allSlugs->contains('content_key', $slug)){
            return $slug;
        }
       
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 50; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('page_key', $newSlug) && ! $allSlugs->contains('content_key', $newSlug)) {
                return $newSlug;
            }
            
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($model,$slug, $id = 0)
    {
        switch($model){

            case 'resources' :
                $data = Resource::select('page_key')->where('page_key', 'like', $slug.'%')
                ->where('parent_id', '<>', $id)
                ->get();
            break;
            case 'news' :
                $data = News::select('page_key')->where('page_key', 'like', $slug.'%')
                ->get();
            break;
            case 'event' :
                $data = Event::select('page_key')->where('page_key', 'like', $slug.'%')
                ->get();
            break;
            case 'cms_pages' :
                $data = CmsPage::select('page_key')->where('page_key', 'like', $slug.'%')
                ->get();
            break;
            case 'business_opportunity':
                $data = BusinessOpportunity::select('page_key')->where('page_key', 'like', $slug . '%')
                ->get();
            break;
            case 'sector':
                $data = Sector::select('page_key')->where('page_key', 'like', $slug . '%')
                    ->get();
            break;
            case 'company' :
                $data = Company::select('page_key')->where('page_key', 'like', $slug.'%')
                ->get();
            break;
            case 'discover_algeria' : 
                $data = DiscoverAlgeriaContent::select('content_key')->where('content_key', 'like', $slug.'%')
                ->get();
            break;

            
        }

        return $data;
    }
}
