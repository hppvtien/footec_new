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

        // Form validation
        $this->validate($request, [
            'model_name' => 'required',
            'perms' => 'required',
        ]);
        $data = [
            'group_id' => $request->group_id,
            'model_name' => $request->model_name,
            'perms' => $request->perms,
        ];
        $checkNameExist = group_permissions::where('model_name', $request->model_name)->first();
        if ($checkNameExist) {
            return back()->with('error', 'Tên nhóm đã tồn tại');
        } else {
            //  Store data in database
            group_permissions::create($data);

            // 
            return redirect()->route('group_pers.list');
        }
    }

    public function editGetGroupPers($id)
    {
        $group_permissions = group_permissions::where('id', $id)->first();
        return view('backend.group_permissions.edit', compact('group_permissions'));
    }
    public function editPostGroup(Request $request, $id)
    {
       
        $data = group_permissions::where('id', $id)->first();
        $data->model_name = $request->model_name;
        $data->perms = $request->perms;
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
