<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_permissions;
use App\Models\users;
use DataTables;
use Carbon\Carbon;
class UserPermissionsController extends Controller
{
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $data = User_permissions::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="' . route('user_pers.edit', $data->id) . '" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="' . route('user_pers.delete', $data->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.user_permissions.list');
    }
    public function addGetUserPers()
    {
        // $user = users::where('is_active',1)->get()->pluck('name','id');
        // return view('backend.user_permissions.add',compact('user'));
        // $user = users::where('is_active',1)->get()->pluck('name','id');
        return view('backend.user_permissions.add');
    }

    // Store Contact Form data
    public function addPostUserPers(Request $request)
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
        User_permissions::create($data);
            return redirect()->route('user_pers.list');
    }

    public function editGetUserPers($id)
    {
        // $group = groups::where('is_active',1)->get()->pluck('name','id');
        $user_permissions = User_permissions::first();
// dd(json_decode($group_permissions->perms));
        return view('backend.user_permissions.edit', compact('user_permissions'));
    }
    public function editPostUserPers(Request $request, $id)
    {
       
        $data = User_permissions::where('id', $id)->first();
        $data->model_name = $request->model_name;
        $data->perms = json_encode($request->perms);
        $data->user_id = $request->user_id;      
        $data->updated_at = Carbon::now();
        // dd($request->is_active);
        $data->save();
        
        return redirect()->route('user_pers.list');
    }
    public function deleteUserPers($id)
    {
        user_permissions::destroy($id);
        return redirect()->route('user_pers.list');

    }
}
