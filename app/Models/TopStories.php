<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blogs;

class TopStories extends Model
{
    //
    protected $table = 'top_story_blogs';



    public function blog(){
        return $this->belongsTo(Blogs::class, 'blog_id', 'id');
    }
}
