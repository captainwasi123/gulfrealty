<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamStaff;
use Auth;

class StaffController extends Controller
{
    public function index()
    {
        $data['menu'] = 'staff';
        $data['data'] = TeamStaff::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.team.staff.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = TeamStaff::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.team.staff.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = TeamStaff::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('name', 'like', '%' . $val . '%');
        })->get();

        return view('admin.team.staff.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //dd($data);
        if (empty($data['name']) || empty($data['experience']) || empty($data['description'])) {

            return redirect()->back()->with('errors', 'Please Fill all required fields.');
        } else {

            $blog = TeamStaff::where('name', $data['name'])->get();

            if (count($blog) == 0) {

                $gv = new TeamStaff;
                $gv->name = $data['name'];
                $gv->designation = $data['designation'];
                $gv->experience = $data['experience'];
                $gv->description = $data['description'];
                $gv->created_by = Auth::guard('admin')->id();
                $gv->save();

                $id = $gv->id;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/team/staff', $newname);

                    $b = TeamStaff::find($id);
                    $b->image = $newname;
                    $b->save();
                }

                return redirect()->back()->with('success', 'New Staff Added.');
            } else {

                return redirect()->back()->with('errors', 'Staff Already Exist.');
            }
        }
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        if (empty($data['name']) || empty($data['experience']) || empty($data['description'])) {

            return redirect()->back()->with('errors', 'Please Fill all required fields.');
        } else {

            $blog = TeamStaff::where('name', $data['name'])->where('id', '!=', base64_decode($data['staff_id']))->get();

            if (count($blog) == 0) {

                $gv = TeamStaff::find(base64_decode($data['staff_id']));
                $gv->name = $data['name'];
                $gv->designation = $data['designation'];
                $gv->experience = $data['experience'];
                $gv->description = $data['description'];
                $gv->save();

                $id = $gv->id;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/team/staff', $newname);

                    $b = TeamStaff::find($id);
                    $b->image = $newname;
                    $b->save();
                }

                return redirect()->back()->with('success', 'Staff Successfully Updated.');
            } else {

                return redirect()->back()->with('errors', 'Staff Already Exist.');
            }
        }
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = TeamStaff::find($id);

        return view('admin.team.staff.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        TeamStaff::destroy($id);

        $response = 'success';

        return $response;
    }
}
