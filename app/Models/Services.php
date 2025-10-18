<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';


    public function subServices(){
        return $this->hasMany(Services::class, 'parent_id', 'id');
    }
}
