<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\group_permissions;
use App\Models\groups;
use DataTables;
use Carbon\Carbon;
class GroupPermissionsController extends Controller
{
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $data = Group_permissions::join('groups', 'groups.id', '=', 'group_permissions.group_id')
                                ->select('group_permissions.*', 'groups.name')
                                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="' . route('group_pers.edit', $data->id) . '" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="' . route('group_pers.delete', $data->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.group_permissions.list');
    }
    public function addGetGroupPers()
    {
        $group = groups::where('is_active',1)->get()->pluck('name','id');
        return view('backend.group_permissions.add',compact('group'));
    }

    // Store Contact Form data
    public function addPostGroupPers(Request $request)
    {
        // $data = $request;
        // Form validation
        $this->validate($request, [
            'group_id' => 'required',
            'model_name' => 'required',
        ]);
        $data = [
            'group_id' => $request->group_id,
            'model_name' => $request->model_name,
            'perms' => json_encode($request->perms),
        ];      
            group_permissions::create($data);
            return redirect()->route('group_pers.list');
    }

    public function editGetGroupPers($id)
    {
        $group = groups::where('is_active',1)->get()->pluck('name','id');
        $group_permissions = Group_permissions::join('groups', 'groups.id', '=', 'group_permissions.group_id')
        ->where('group_permissions.id',$id)
        ->select('group_permissions.*', 'groups.name as group_name')
        ->first();
// dd(json_decode($group_permissions->perms));
        return view('backend.group_permissions.edit', compact('group_permissions','group'));
    }
    public function editPostGroupPers(Request $request, $id)
    {
       
        $data = group_permissions::where('id', $id)->first();
        $data->model_name = $request->model_name;
        $data->perms = json_encode($request->perms);
        $data->group_id = $request->group_id;      
        $data->updated_at = Carbon::now();
        // dd($request->is_active);
        $data->save();
        
        return redirect()->route('group_pers.list');
    }
    public function deleteGroupPers($id)
    {
        group_permissions::destroy($id);
        return redirect()->route('group_pers.list');

    }
}
