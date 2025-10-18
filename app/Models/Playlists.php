<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Episodes;

class Playlists extends Model
{
    
    protected $table = 'playlists';


    

    public function episodes(){
        return $this->hasMany(Episodes::class, 'playlist_id', 'id');
    }

    public function episodes_desc(){
        return $this->hasMany(Episodes::class, 'playlist_id', 'id')->orderBy('id', 'desc');
    }
}
