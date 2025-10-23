<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\realestate\Properties;
use App\Models\Amenities;
use App\Models\Locations;
use App\Models\PropertyTypes;

class PropertyController extends Controller
{
    public function index(){

    }


    public function buyProperties(){
        
        $data['nav'] = 'buy';
        $data['purpose'] = 'Sale';
        $data['data'] = Properties::where('status', '1')->where('purpose', 'Sale')->paginate(10);
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();

        
        return view('web.properties.index')->with($data);
    }
    public function rentProperties(){
        
        $data['nav'] = 'rent';
        $data['purpose'] = 'Rent';
        $data['data'] = Properties::where('status', '1')->where('purpose', 'Rent')->paginate(10);
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        
        return view('web.properties.index')->with($data);
    }

    public function search(Request $request){
        $data['request'] = $request->all();

        $data['nav'] = 'rent';
        $data['purpose'] = $data['request']['purpose'];
        $data['locations'] = Locations::orderBy('name')->get();
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        $data['data'] = Properties::where('status', '1')
                                    ->when(!empty($data['request']['purpose']), function ($q) use ($data){
                                        return $q->where('purpose', $data['request']['purpose']);
                                    })
                                    ->when(!empty($data['request']['location']), function ($q) use ($data){
                                        return $q->where('location', base64_decode($data['request']['location']));
                                    })
                                    ->when(!empty($data['request']['type']), function ($q) use ($data){
                                        return $q->where('property_type', base64_decode($data['request']['type']));
                                    })
                                    ->where('purpose', 'Rent')
                                    ->paginate(10);
        
        return view('web.properties.index')->with($data);
    }


    public function details($slug){
        
        $data['data'] = Properties::where('status', '1')->where('slug', $slug)->first();
        if(empty($data['data']->id)){
            return redirect(route('home'));
        }
        
        return view('web.properties.details')->with($data);
    }
}
