<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagData;

class BlogTags extends Model
{
    //
    protected $table = 'blogs_tags';



    public function data(){
        return $this->belongsTo(TagData::class, 'tag', 'tag');
    }
}
