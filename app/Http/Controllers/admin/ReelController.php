<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryReels;
use Auth;

class ReelController extends Controller
{
    public function index()
    {
        $data['menu'] = 'reels';
        $data['data'] = GalleryReels::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.gallery.reels.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = GalleryReels::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.gallery.reels.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = GalleryReels::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('title', 'like', '%' . $val . '%');
        })->get();

        return view('admin.gallery.reels.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['reel_link']) || empty($data['title'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $blog = GalleryReels::where('reel_link', $data['reel_link'])->get();

            if (count($blog) == 0) {

                $gv = new GalleryReels;
                $gv->title = $data['title'];
                $gv->reel_link = $data['reel_link'];
                $gv->created_by = Auth::guard('admin')->id();
                $gv->save();


                $response['success'] = 'success';
                $response['message'] = 'Success! New Reel Added.';
            } else {

                $response['success'] = false;
                $response['errors'] = 'Erorr, Reel already exist.';
            }
        }

        echo json_encode($response);
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['reel_link']) || empty($data['title'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $gv = GalleryReels::find(base64_decode($data['reel_id']));
            $gv->title = $data['title'];
            $gv->reel_link = $data['reel_link'];
            $gv->save();


            $response['success'] = 'success';
            $response['message'] = 'Success! Reel Successfully Updated.';
        }

        echo json_encode($response);
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = GalleryReels::find($id);

        return view('admin.gallery.reels.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        GalleryReels::destroy($id);

        $response = 'success';

        return $response;
    }
}
