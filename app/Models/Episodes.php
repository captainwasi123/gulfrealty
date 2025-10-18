<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Playlists;
use App\Models\Admin;
use Auth;

class Episodes extends Model
{
    
    protected $table = 'episodes';

    public static function create(array $data){
        $b = new Episodes;
        $b->title = $data['title'];
        $b->img_alt = $data['image_alt'];
        $b->visit_link = $data['visit_link'];
        $b->playlist_id = $data['playlist_id'];
        $b->created_by = Auth::guard('admin')->id();
        $b->save();

        return $b->id;
    }

     public static function episode_update($id, array $data){
        $b = Episodes::find($id);
        $b->title = $data['title'];
        $b->img_alt = $data['image_alt'];
        $b->visit_link = $data['visit_link'];
        $b->playlist_id = $data['playlist_id'];
        $b->save();

        return $b->id;
    }

    public function playlist(){
        return $this->belongsTo(Playlists::class, 'playlist_id', 'id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
