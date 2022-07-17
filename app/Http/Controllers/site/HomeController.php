<?php namespace App\Http\Controllers\site;

use App\Models\Announcement;
use App\Models\Achievement;
use App\Models\Administration;
use App\Models\Gallery;
use App\Models\HowDoI;
use App\Models\Events;
use App\Models\Documents;
use App\Models\DocumentCategory;
use App\Models\Service;
use App\Models\Quote;
use App\Models\PressRelease;
use App\Models\OnlineService;
use App\Models\Notice;
use App\Models\News;
use App\Models\Campaign;
use App\Models\Video;
use App\Models\Photo;
use App\Models\Product;
use App\Models\WelcomeNote;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Faq;
use App\Models\QuickInfo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class HomeController extends BaseSiteController
{

    public function index()
    {
        
        $dg = Administration::where('position', '=', 1)->first();

        // $other_executives = Administration::whereIn('position',[2,3,4])->orderBy('position','ASC')->get();

        //distinct()->whereNotNull('meta_value')->get(['meta_value'])
        
        $welcomeNote = WelcomeNote::where('status',1)->first();

        $announcements = Announcement::where('active',1)->orderBy('id', 'DESC')->take(4)->get();

        // $events = Events::where('active',1)->orderBy('event_date', 'DESC')->take(4)->get();

        $news_list = News::where('active',1)->orderBy('id', 'DESC')->take(4)->get();

        $quickinfos = QuickInfo::where('active',1)->orderBy('id', 'DESC')->get();


        // $product_categories = ProductCategory::where('active',1)->orderBy('id', 'DESC')->take(6)->get();
        $products = Product::where('active',1)->orderBy('id', 'DESC')->with('category')->take(10)->get();

        // $faqs = Faq::where('active',1)->orderBy('id', 'DESC')->take(5)->get();

        $latest_documents  = Documents::where('active',1)->orderBy('id', 'DESC')->take(5)->get();

        //$sponsors = Sponsor::orderBy('id', 'DESC')->limit(4)->get();
        
        $services = Service::where('active',1)->orderBy('id', 'DESC')->limit(5)->get();

        $featured_service =  Service::where('active',1)->where('featured',1)->orderBy('id', 'DESC')->first();

        if(!$featured_service) $featured_service =  Service::where('active',1)->orderBy('id', 'DESC')->first();
       
        $not_featured_services =  Service::where('active',1)->where('featured',0)->orderBy('id', 'DESC')->get();
       
        $featured_categories = DocumentCategory::where('active',1)->where('featured',1)->orderBy('id', 'DESC')->limit(2)->with('documents')->get();
       
        $not_featured_category = DocumentCategory::where('active',1)->where('featured',0)->where('title_en', 'like', '%guide%')->orderBy('id', 'DESC')->with('documents')->first();

        if(!$not_featured_category) DocumentCategory::where('active',1)->where('featured',0)->orderBy('id', 'DESC')->first();

        // $campaign =Campaign::where('active',1)->orderBy('id', 'DESC')->first();

        $achievements = Achievement::where('active',1)->orderBy('id', 'DESC')->take(6)->get();

        $quotes = Quote::where('active',1)->orderBy('id', 'DESC')->get();

        // $online_services = OnlineService::where('active',1)->orderBy('id', 'DESC')->limit(4)->get();

        $howdois = HowDoI::where('active',1)->orderBy('id','DESC')->limit(4)->get();

        // $press_releases = PressRelease::where('active',1)->orderBy('id', 'DESC')->limit(4)->get();

        // $notices = Notice::where('active',1)->orderBy('id', 'DESC')->limit(6)->get();
        
        $slideshow = Gallery::where('featured', 1)->where('type', '=', 'photos')->first();

        $latest_photo = Photo::orderBy('created_at','DESC')->where('status',1)->whereHas('gallery',function($q){
            $q->where('status', 1);
        })->first();

        $latest_videos = Video::orderBy('created_at','DESC')->where('status',1)->whereHas('gallery',function($q){
            $q->where('status', 1);
        })->limit(10)->get();

        // $videoshow = Gallery::where('featured', 1)->where('type', '=', 'videos')->first();

        if ($slideshow == null) {
            $slideshow = [];
        } else {
            $slideshow = $slideshow->photos()->orderBy('id', 'DESC')->limit(10)->get();
        }

        // if ($videoshow == null) {
        //     $videoshow = [];
        // } else {
        //     $videoshow = $videoshow->videos()->orderBy('id', 'DESC')->limit(1)->get();
        // }

        $announcements = Announcement::orderBy('id', 'DESC')->where('active', 1)->limit(8)->get();

        // $services = Service::where('active', true)->with('documentCategories')
        // ->whereHas('documentCategories',function($q){
        //   $q->where('featured', true);
        // })->take(4)->get();

        // echo $publicationCategory;exit;

        return view('site.home', compact(
            'news_list',
            'dg',
            'welcomeNote',
            'slideshow',
            'quotes',
            'howdois',
            'latest_documents',
            'achievements',
            'services',
            'announcements',
            'quickinfos',
            'latest_videos',
            'latest_photo',
            'featured_service',
            'not_featured_services',
            'not_featured_category',
            'featured_categories',
            'products',
            // 'online_services'
        ));
    }
}
