<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Services;
use App\Models\Blogs;
use App\Models\Episodes;
use App\Models\Locations;
use App\Models\PropertyTypes;
use App\Models\realestate\Properties;
use App\Models\GalleryReels;

class WebController extends Controller
{
    public function index(){
        $data['nav'] = 'home';
        $data['sub_footer'] = 'visible';
        $data['blogs'] = Blogs::where('status', '1')->orderBy('created_at', 'desc')->limit(4)->get();

        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('category', 'desc')->orderBy('name')->get();
        $data['recently_added'] = Properties::where('status', '1')->orderBy('created_at', 'desc')->limit(8)->get();
        $data['latest_blogs'] = Blogs::where('status', '1')->orderBy('created_at', 'desc')->limit(6)->get();
        $data['recent_reels'] = GalleryReels::orderBy('created_at', 'desc')->limit(4)->get();
        
        return view('web.index')->with($data);
    }


    public function collaborate(){
        $data['nav'] = 'collaborate';
        $data['titleImg'] = 'services.jpg';
        

        return view('web.collaborate')->with($data);
    }


    public function faq(){
        $data['nav'] = 'faq';
        $data['titleImg'] = 'faqs.png';
        $data['title'] = 'FAQ';
        
        return view('web.faq')->with($data);
    }


    public function about(){
        $data['nav'] = 'about';
        $data['titleImg'] = 'about.png';
        $data['title'] = 'About Us';
        $data['sub_footer'] = 'visible';
        
        return view('web.about')->with($data);
    }


    public function writeForUs(){
        $data['nav'] = 'write-for-us';
        $data['titleImg'] = 'about.png';
        $data['title'] = 'Write For Us';
        $data['sub_footer'] = 'visible';
        
        return view('web.guest-post')->with($data);
    }


    public function contact(){
        $data['nav'] = 'contact';
        $data['titleImg'] = 'contact.jpg';
        $data['title'] = 'Contact Us';
        $data['sub_footer'] = 'visible';
        
        return view('web.contact')->with($data);
    }


    public function privacyPolicy(){
        $data['titleImg'] = 'faqs.png';
        $data['title'] = 'Privacy Policy';
        
        return view('web.privacy-policy')->with($data);
    }


    public function termsCondition(){
        $data['titleImg'] = 'faqs.png';
        $data['title'] = 'Terms & Conditions';
        
        return view('web.terms')->with($data);
    }


    public function caseStudies(){
        $data['nav'] = 'case-studies';
        $data['titleImg'] = 'faqs.png';
        $data['title'] = 'Client Case Studies';
        
        return view('web.case-studies')->with($data);
    }


    //Get Aside
    public function getAside(){

        $data['blog_categories'] = Categories::has('blogs', '>', 0)->with('blogs')->orderBy('name')->get();
        $data['services'] = Services::where('parent_id', '0')->get();
        
        return view('web.includes.elements.aside')->with($data);
    }
}
