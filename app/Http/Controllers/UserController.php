<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use DataTables;
use Carbon\Carbon;
class UserController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Users::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="' . route('user.edit', $data->id) . '" class="edit btn btn-success btn-sm">Edit</a>
                    <a href="' . route('user.delete', $data->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.list');
    }
    public function addGetUser()
    {
        // $user = users::where('is_active',1)->get()->pluck('name','id');
        // return view('backend.users.add',compact('user'));
        // $user = users::where('is_active',1)->get()->pluck('name','id');
        return view('backend.users.add');
    }

    // Store Contact Form data
    public function addPostUser(Request $request)
    {
        // $data = $request;
        // Form validation
        $this->validate($request, [
            'user_id' => 'required',
            'model_name' => 'required',
        ]);
        $data = [
            'user_id' => $request->user_id,
            'model_name' => $request->model_name,
            'perms' => json_encode($request->perms),
        ];
        Users::create($data);
            return redirect()->route('user_pers.list');
    }

    public function editGetUser($id)
    {
        // $group = groups::where('is_active',1)->get()->pluck('name','id');
        $Users = Users::first();
// dd(json_decode($group_permissions->perms));
        return view('backend.users.edit', compact('users'));
    }
    public function editPostUser(Request $request, $id)
    {

        $data = Users::where('id', $id)->first();
        $data->model_name = $request->model_name;
        $data->perms = json_encode($request->perms);
        $data->user_id = $request->user_id;
        $data->updated_at = Carbon::now();
        // dd($request->is_active);
        $data->save();

        return redirect()->route('user.list');
    }
    public function deleteUser($id)
    {
        Users::destroy($id);
        return redirect()->route('user.list');

    }
}
