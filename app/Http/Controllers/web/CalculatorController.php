<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    //
    public function mortgage(){
        $data['nav'] = 'calculators';
        
        return view('web.calculators.mortgage')->with($data);
    }
}
