<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamAgents;
use Auth;

class AgentController extends Controller
{
    public function index()
    {
        $data['menu'] = 'agents';
        $data['data'] = TeamAgents::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.team.agents.index')->with($data);
    }

    public function load()
    {
        $p = 1;
        if (!empty($_GET['page'])) {
            $p = $_GET['page'];
        }
        $data = TeamAgents::orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $p);

        return view('admin.team.agents.load', ['data' => $data]);
    }

    public function search($val)
    {
        $response = [];
        $data = TeamAgents::when($val !== '--empty--', function ($q) use ($val) {
            return $q->where('name', 'like', '%' . $val . '%');
        })->get();

        return view('admin.team.agents.load', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //dd($data);
        if (empty($data['name']) || empty($data['experience']) || empty($data['property_sold']) || empty($data['description'])) {

            return redirect()->back()->with('errors', 'Please Fill all required fields.');
        } else {

            $blog = TeamAgents::where('name', $data['name'])->get();

            if (count($blog) == 0) {

                $gv = new TeamAgents;
                $gv->name = $data['name'];
                $gv->experience = $data['experience'];
                $gv->property_sold = $data['property_sold'];
                $gv->description = $data['description'];
                $gv->created_by = Auth::guard('admin')->id();
                $gv->save();

                $id = $gv->id;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/team/agents', $newname);

                    $b = TeamAgents::find($id);
                    $b->image = $newname;
                    $b->save();
                }

                return redirect()->back()->with('success', 'New Agent Added.');
            } else {

                return redirect()->back()->with('errors', 'Agent Already Exist.');
            }
        }
    }

    public function update_blog(Request $request)
    {
        $data = $request->all();
        if (empty($data['name']) || empty($data['experience']) || empty($data['property_sold']) || empty($data['description'])) {

            return redirect()->back()->with('errors', 'Please Fill all required fields.');
        } else {

            $blog = TeamAgents::where('name', $data['name'])->where('id', '!=', base64_decode($data['agent_id']))->get();

            if (count($blog) == 0) {

                $gv = TeamAgents::find(base64_decode($data['agent_id']));
                $gv->name = $data['name'];
                $gv->experience = $data['experience'];
                $gv->property_sold = $data['property_sold'];
                $gv->description = $data['description'];
                $gv->save();

                $id = $gv->id;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $newname = $id . date('dmyhis') . '.' . $ext;

                    $file->move(public_path() . '/storage/team/agents', $newname);

                    $b = TeamAgents::find($id);
                    $b->image = $newname;
                    $b->save();
                }

                return redirect()->back()->with('success', 'Agent Successfully Updated.');
            } else {

                return redirect()->back()->with('errors', 'Agent Already Exist.');
            }
        }
    }


    public function edit($id)
    {
        $id = base64_decode($id);

        $data = TeamAgents::find($id);

        return view('admin.team.agents.edit', ['data' => $data]);
    }



    public function delete($id)
    {
        $id = base64_decode($id);

        TeamAgents::destroy($id);

        $response = 'success';

        return $response;
    }
}
