<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlists;
use App\Models\TopStories;

class EpisodeController extends Controller
{
    
    public function index(){
        $data['nav'] = 'episodes';
        $data['title'] = 'Episodes';
        $data['playlists'] = Playlists::orderby('id', 'desc')->get();

        $data['popular_series'] = Playlists::where('popular', '1')->first();
        $data['top_stories'] = TopStories::all();

        return view('web.episodes.index')->with($data);
    }

    public function episodePlaylist($slug){
        $data['nav'] = 'episodes';
        $data['title'] = 'Episodes';
        $data['playlist'] = Playlists::where('slug', $slug)->first();
        if(empty($data['playlist'])){
            return redirect(route('episodes'));
        }
        $data['popular_series'] = Playlists::where('popular', '1')->first();
        $data['top_stories'] = TopStories::all();

        return view('web.episodes.playlist')->with($data);
    }
}
