<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SnippetCode;
use App\Models\MetaTags;
use App\Models\Services;
use App\Models\Categories;
use App\Models\Playlists;
use App\Models\TopStories;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using Closure based composers...
        View::composer('*', function ($view) {

            $actual_link = '';
            if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
                $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $data['actual_link'] = $actual_link;
            //dd($data);
            $al = explode('?', $actual_link);
            $data['actual_link'] = $al[0];
            $data['metaTags'] = MetaTags::where('url', $data['actual_link'])->first();

            $data['headSnippet'] = SnippetCode::where('position', 'Head')
                                                ->when(1>0, function($q) use ($data){
                                                    return $q->where('page_url', '')
                                                                ->orwhere('page_url', $data['actual_link']);
                                                })->get();
            $data['bodySnippet'] = SnippetCode::where('position', 'Body')
                                                ->when(1>0, function($q) use ($data){
                                                    return $q->where('page_url', '')
                                                                ->orwhere('page_url', $data['actual_link']);
                                                })->get();

            $data['popular_series'] = Playlists::where('popular', '1')->first();
            $data['all_playlists'] = Playlists::orderby('id', 'desc')->get();
            $data['top_stories'] = TopStories::limit(6)->get();
            $data['header_services'] = Services::where('parent_id', '0')->get();
            $data['blog_categories'] = Categories::all();
            
            $view->with($data);
        });
    }
}
