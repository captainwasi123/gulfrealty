<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamStaff extends Model
{
    protected $table = 'tbl_team_staff';


    
    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    
}
