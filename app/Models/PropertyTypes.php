<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\realestate\Properties;

class PropertyTypes extends Model
{
    protected $table = 'tbl_property_type';


    
    public function prop(){
        return $this->hasMany(Properties::class, 'property_type', 'id');
    }
}
