<?php

namespace App\Http\Controllers;

use App\Models\groups;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
class GroupsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Groups::orderBy('id', 'DESC')->limit(10)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="' . route('group.edit', $data->id) . '" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="' . route('group.delete', $data->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.group.list');
        
    }


    
    // Create createGroups Form
    // public function listGroup()
    // {
    //     $data = groups::get();
    //     // dd($data);
    //     return view('backend.group.list',compact('data'));
    // }
    public function addGetGroup()
    {
        return view('backend.group.add');
    }

    // Store Contact Form data
    public function addPostGroup(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'name' => 'required|unique:groups',
        ]);
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active,
        ];
        $checkNameExist = groups::where('name', $request->name)->first();
        if ($checkNameExist) {
            return back()->with('error', 'Tên nhóm đã tồn tại');
        } else {
            //  Store data in database
            groups::create($data);

            // 
            return redirect()->route('group.list');
        }
    }

    public function editGetGroup($id)
    {
        $group = groups::where('id', $id)->first();
        return view('backend.group.edit', compact('group'));
    }
    public function editPostGroup(Request $request, $id)
    {
       
        $group = groups::where('id', $id)->first();
        $group->name = $request->name;
        $group->is_active = $request->is_active == null ? 0 : 1;      
        $group->updated_at = Carbon::now();   
        // dd($request->is_active);
        $group->save();
        
        return redirect()->route('group.list');
    }
    public function deletegroup($id)
    {
        groups::destroy($id);
        return redirect()->route('group.list');

    }
}
