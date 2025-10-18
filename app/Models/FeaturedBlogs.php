<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blogs;

class FeaturedBlogs extends Model
{
    //
    protected $table = 'featured_blogs';



    public function blog(){
        return $this->belongsTo(Blogs::class, 'blog_id', 'id');
    }
}
