<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryVideos;
use Auth;

class VideoController extends Controller
{
    public function index()
    {
        $data['menu'] = 'videos';
        $data['data'] = GalleryVideos::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.gallery.videos.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = GalleryVideos::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.gallery.videos.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = GalleryVideos::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('title', 'like', '%' . $val . '%');
        })->get();

        return view('admin.gallery.videos.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['video_link']) || empty($data['title']) || empty($data['type'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $blog = GalleryVideos::where('video_link', $data['video_link'])->where('type', $data['type'])->get();

            if (count($blog) == 0) {

                $gv = new GalleryVideos;
                $gv->title = $data['title'];
                $gv->type = $data['type'];
                $gv->video_link = $data['video_link'];
                $gv->created_by = Auth::guard('admin')->id();
                $gv->save();


                $response['success'] = 'success';
                $response['message'] = 'Success! New Video Added.';
            } else {

                $response['success'] = false;
                $response['errors'] = 'Erorr, Video already exist.';
            }
        }

        echo json_encode($response);
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        $response = [];

        if (empty($data['video_link']) || empty($data['title']) || empty($data['type'])) {
            $response['success'] = false;
            $response['errors'] = 'Please Fill all required fields.';
        } else {

            $gv = GalleryVideos::find(base64_decode($data['video_id']));
            $gv->title = $data['title'];
            $gv->type = $data['type'];
            $gv->video_link = $data['video_link'];
            $gv->save();


            $response['success'] = 'success';
            $response['message'] = 'Success! Video Successfully Updated.';
        }

        echo json_encode($response);
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = GalleryVideos::find($id);

        return view('admin.gallery.videos.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        GalleryVideos::destroy($id);

        $response = 'success';

        return $response;
    }
}
