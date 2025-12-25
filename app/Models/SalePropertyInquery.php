<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SalePropertyInqueryImages;

class SalePropertyInquery extends Model
{
    protected $table = 'tbl_sell_property_inquery';



    public function images(){
        return $this->hasMany(SalePropertyInqueryImages::class, 'inquery_id', 'id');
    }
}
