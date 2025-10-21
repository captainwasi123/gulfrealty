<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use Auth;

class TeamAgents extends Model
{
    protected $table = 'tbl_team_agents';


    
    public function user(){
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}
