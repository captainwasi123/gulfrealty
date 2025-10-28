<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamAgents;
use App\Models\Locations;
use App\Models\Amenities;
use App\Models\PropertyTypes;
use App\Models\realestate\Properties;
use App\Models\realestate\PropertiesAmenities;
use App\Models\realestate\PropertiesImages;
use Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $data['menu'] = 'properties';
        $data['data'] = Properties::orderBy('created_at', 'desc')->paginate(10);
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        $data['locations'] = Locations::orderBy('name')->get();
        $data['amenities'] = Amenities::orderBy('name')->get();


        return view('admin.realestate.properties.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = Properties::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.realestate.properties.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = Properties::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('title', 'like', '%' . $val . '%');
        })->get();

        return view('admin.realestate.properties.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        
        $blog = Properties::where('slug', $data['slug'])->get();

        if (count($blog) == 0) {

            $gv = new Properties;
            $gv->title = $data['title'];
            $gv->slug = $data['slug'];
            $gv->property_type = $data['type'];
            $gv->purpose = $data['purpose'];
            $gv->price = $data['price'];
            $gv->country = $data['country'];
            $gv->city = $data['city'];
            $gv->location = $data['area'];
            $gv->full_address = $data['address'];
            $gv->latitude = $data['latitude'];
            $gv->longitude = $data['longitude'];
            $gv->description = $data['description'];
            $gv->trending = empty($data['trending']) ? '0' : '1';
            $gv->created_by = Auth::guard('admin')->id();
            $gv->save();

            $id = $gv->id;

            foreach($data['amenities'] as $val){

                $a = new PropertiesAmenities;
                $a->property_id = $id;
                $a->amenity_id = $val;
                $a->save();
            }

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $i = 1;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . $i . date('dmyhis') . '.' . $ext;

                    $file->move(public_path('storage/realestate/properties'), $newname);

                    // Save each image record (if you’re storing multiple per agent)
                    $image = new PropertiesImages; // create a separate model/table for images
                    $image->property_id = $id;
                    $image->image = $newname;
                    $image->save();

                    $i++;
                }
            }

            return redirect()->back()->with('success', 'New Property Added.');
        } else {

            return redirect()->back()->with('errors', 'Property Slug Already Exist.');
        }
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        
        $blog = Properties::where('slug', $data['slug'])->where('id', '!=', base64_decode($data['property_id']))->get();

        if (count($blog) == 0) {

            $gv = Properties::find(base64_decode($data['property_id']));
            $gv->title = $data['title'];
            $gv->slug = $data['slug'];
            $gv->property_type = $data['type'];
            $gv->purpose = $data['purpose'];
            $gv->price = $data['price'];
            $gv->country = $data['country'];
            $gv->city = $data['city'];
            $gv->location = $data['area'];
            $gv->full_address = $data['address'];
            $gv->latitude = $data['latitude'];
            $gv->longitude = $data['longitude'];
            $gv->description = $data['description'];
            $gv->trending = empty($data['trending']) ? '0' : '1';
            $gv->save();

            $id = $gv->id;

            PropertiesAmenities::where('property_id', $id)->delete();
            foreach($data['amenities'] as $val){

                $a = new PropertiesAmenities;
                $a->property_id = $id;
                $a->amenity_id = $val;
                $a->save();
            }

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $i = 1;
                foreach ($files as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . $i . date('dmyhis') . '.' . $ext;

                    $file->move(public_path('storage/realestate/properties'), $newname);

                    // Save each image record (if you’re storing multiple per agent)
                    $image = new PropertiesImages; // create a separate model/table for images
                    $image->property_id = $id;
                    $image->image = $newname;
                    $image->save();

                    $i++;
                }
            }

            return redirect()->back()->with('success', 'Property Successfully Updated.');
        } else {

            return redirect()->back()->with('errors', 'Property Slug Already Exist.');
        }
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data['data'] = Properties::find($id);
        $data['propertyTypes'] = PropertyTypes::orderBy('name')->get();
        $data['locations'] = Locations::orderBy('name')->get();
        $data['amenities'] = Amenities::orderBy('name')->get();

        return view('admin.realestate.properties.edit')->with($data);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        Properties::destroy($id);
        PropertiesAmenities::where('property_id', $id)->delete();
        PropertiesImages::where('property_id', $id)->delete();

        $response = 'success';

        return $response;
    }
}
