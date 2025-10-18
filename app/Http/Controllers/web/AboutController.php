<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryVideos;
use App\Models\GalleryReels;
use App\Models\GalleryImages;
use App\Models\GalleryImagesDetails;

class AboutController extends Controller
{
    public function index(){
        $data['nav'] = 'about';

        
        return view('web.about-us.index')->with($data);
    }

    public function ourTeam(){
        $data['nav'] = 'about';

        
        return view('web.about-us.team')->with($data);
    }

    public function ceoMessage(){
        $data['nav'] = 'about';

        
        return view('web.about-us.ceo-message')->with($data);
    }




    public function gallery(){
        $data['nav'] = 'about';
        $data['data'] = GalleryVideos::orderBy('created_at', 'desc')->paginate(24);
        
        return view('web.about-us.gallery.index')->with($data);
    }
    public function galleryPodcast(){
        $data['nav'] = 'about';

        
        return view('web.about-us.gallery.podcasts')->with($data);
    }
    public function galleryReels(){
        $data['nav'] = 'about';
        $data['data'] = galleryReels::orderBy('created_at', 'desc')->paginate(24);
        
        return view('web.about-us.gallery.reels')->with($data);
    }
    public function galleryImages(){
        $data['nav'] = 'about';
        $data['data'] = galleryImages::orderBy('created_at', 'desc')->paginate(48);
        
        return view('web.about-us.gallery.images')->with($data);
    }
    public function galleryImagesDetails($id){

        $data['nav'] = 'about';
        $data['event'] = galleryImages::find(base64_decode($id));
        $data['data'] = galleryImagesDetails::where('image_id', base64_decode($id))->get();
        
        return view('web.about-us.gallery.images-detail')->with($data);
    }
}
