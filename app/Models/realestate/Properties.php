<?php

namespace App\Models\realestate;

use Illuminate\Database\Eloquent\Model;
use App\Models\realestate\PropertiesAmenities;
use App\Models\realestate\PropertiesImages;
use App\Models\PropertyTypes;
use App\Models\Locations;
use App\Models\Admin;
use Auth;

class Properties extends Model
{

    Protected $table = 'tbl_properties';



    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    public function type(){
        return $this->belongsTo(PropertyTypes::class, 'property_type', 'id');
    }
    public function area(){
        return $this->belongsTo(Locations::class, 'location', 'id');
    }

    public function amenities(){
        return $this->hasMany(PropertiesAmenities::class, 'property_id', 'id');
    }

    public function images(){
        return $this->hasMany(PropertiesImages::class, 'property_id', 'id');
    }
}
