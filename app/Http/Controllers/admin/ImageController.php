<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImages;
use App\Models\GalleryImagesDetails;
use Auth;

class ImageController extends Controller
{
    public function index()
    {
        $data['menu'] = 'images';
        $data['data'] = GalleryImages::orderBy('created_at', 'desc')->paginate(24);

        return view('admin.gallery.images.index')->with($data);
    }



    public function search($val)
    {
        $response = [];
        $data = GalleryImages::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('title', 'like', '%' . $val . '%');
        })->get();

        return view('admin.gallery.images.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        
        $data = $request->all();

        if (empty($data['title']) || empty($data['description'])) {

            return redirect()->back()->with('errors', 'Please Fill all required fields.');
        } else {

            $gi = new GalleryImages;
            $gi->title = $data['title'];
            $gi->description = $data['description'];
            $gi->created_by = Auth::guard('admin')->id();
            $gi->save();

            $id = $gi->id;

            $image_get = $request->images;
            $i = 1;
            foreach ($image_get as $image) {
                
                $ext = $image->getClientOriginalExtension();
                $newname = $i.$id . date('dmyhis') . '.' . $ext;

                $image->move(public_path() . '/storage/gallery/images', $newname);

                $b = new GalleryImagesDetails;
                $b->image_id = $id;
                $b->image = $newname;
                $b->save();

                $i++;
            }
            return redirect()->back()->with('success', 'Images Added');
        }
      
    }


    public function delete($id)
    {
        $id = base64_decode($id);

        GalleryImages::destroy($id);
        GalleryImagesDetails::where('image_id', $id)->delete();
        
        $response = 'success';

        return $response;
    }
}
