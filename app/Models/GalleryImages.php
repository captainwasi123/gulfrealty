<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\GalleryImagesDetails;
use Auth;

class GalleryImages extends Model
{
    protected $table = 'tbl_gallery_images';

    



    public function images(){
        return $this->hasMany(GalleryImagesDetails::class, 'image_id', 'id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
