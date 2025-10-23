<?php

namespace App\Models\realestate;

use Illuminate\Database\Eloquent\Model;
use App\Models\Amenities;

class PropertiesAmenities extends Model
{
    
    Protected $table = 'tbl_properties_amenities';

    public $timestamps = false;


    public function amen(){
        return $this->belongsTo(Amenities::class, 'amenity_id', 'id');
    }
}
