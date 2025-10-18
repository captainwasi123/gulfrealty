<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\BlogTags;
use App\Models\TagData;
use App\Models\Categories;
use App\Models\Episodes;
use App\Models\Playlists;
use App\Models\FeaturedBlogs;
use App\Models\TopStories;
use URL;

class BlogController extends Controller
{
    
    public function index(){
        $data['nav'] = 'blogs';
        $data['title'] = 'Blogs';
        if(!empty($_GET['page'])){
            $data['nofollow'] = '1';
        }
        $data['data'] = Blogs::where('status', '1')->orderBy('created_at', 'desc')->paginate(10);

        $data['featured'] = FeaturedBlogs::all();
        $data['categories'] = Categories::all();
        //dd($data['data']);
        return view('web.blogs.index')->with($data);
    }

    public function search($val){

        $data['data'] = Blogs::where('heading', 'LIKE', '%'.$val.'%')->orderBy('created_at', 'desc')->limit(4)->get();
        if(count($data['data']) == 0){
            return 'not-found';
        }else{
            return view('web.includes.elements.search')->with($data);
        }
    }

    public function blogCategory($slug){
        $data['nav'] = 'blogs';
        if(!empty($_GET['page'])){
            $data['nofollow'] = '1';
        }
        $data['categories'] = Categories::all();
        $category = Categories::where('slug', $slug)->first();
        if(!empty($category->id)){
            $data['title'] = $category->name;
            $data['type'] = 'category';
            $data['data'] = Blogs::where('status', '1')
                                    ->where('category_id', $category->id)
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(10);

            return view('web.blogs.index')->with($data);
        }else{
            return redirect(route('blogs'));
        }
    }

    public function details($blog_slug){
        $data['nav'] = 'blogs';
        
        $data['data'] = Blogs::where('slug', $blog_slug)->where('status', '1')->first();
        if(empty($data['data']->id)){
            return redirect(route('blogs'));
        }
        $data['og_img'] = URL::to('public/storage/blogs/'.$data['data']->banner);
        $data['popular_series'] = Playlists::where('popular', '1')->first();
        $data['top_stories'] = TopStories::all();

        return view('web.blogs.details')->with($data);
    }


    //Experience

    
    public function experience(){
        $data['nav'] = 'experience';
        $data['title'] = 'My Experience';
        if(!empty($_GET['page'])){
            $data['nofollow'] = '1';
        }
        $data['data'] = Blogs::where('status', '1')->where('experience', '1')->orderBy('created_at', 'desc')->paginate(10);

        $data['categories'] = Categories::all();
        //dd($data['data']);
        return view('web.experience.index')->with($data);
    }
}
