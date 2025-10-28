<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryReels;
use App\Models\Locations;
use App\Models\realestate\Properties;
use Auth;

class LocationController extends Controller
{
    public function index()
    {
        $data['menu'] = 'locations';
        $data['data'] = Locations::orderBy('created_at', 'desc')->paginate(25);

        return view('admin.realestate.locations.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = Locations::orderBy('created_at', 'desc')->paginate(25, ['*'], 'page', $p);

        return view('admin.realestate.locations.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = Locations::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('name', 'like', '%' . $val . '%');
        })->get();

        return view('admin.realestate.locations.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['name'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $blog = Locations::where('name', $data['name'])->get();

            if (count($blog) == 0) {

                $gv = new Locations;
                $gv->name = $data['name'];
                $gv->save();


                $response['success'] = 'success';
                $response['message'] = 'Success! New Location Added.';
            } else {

                $response['success'] = false;
                $response['errors'] = 'Erorr, Location already exist.';
            }
        }

        echo json_encode($response);
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['name'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $gv = Locations::find(base64_decode($data['location_id']));
                $gv->name = $data['name'];
                $gv->save();


            $response['success'] = 'success';
            $response['message'] = 'Success! Location Successfully Updated.';
        }

        echo json_encode($response);
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = Locations::find($id);

        return view('admin.realestate.locations.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $response = '';
        $id = base64_decode($id);
        $p = Properties::where('location', $id)->first();

        if (!empty($p->id)) {
            $response = '1';
        } else {

            Locations::destroy($id);


            $response = '2';
        }
        echo $response;
    }
}
