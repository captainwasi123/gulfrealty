<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use Auth;

class GalleryReels extends Model
{
    protected $table = 'tbl_gallery_reels';


    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
