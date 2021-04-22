<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admins;
use Carbon\Carbon;
use DataTables;
class AdminsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admins::orderBy('id', 'DESC')->limit(10)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="' . route('admins.edit', $data->id) . '" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="' . route('admins.delete', $data->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admins.list');
        
    }

    public function addGetAdmins()
    {
        return view('backend.admins.add');
    }

    // Store Contact Form data
    public function addPostAdmins(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'user_name' => 'required|unique:admins',
            'full_name' => 'required',
        ]);
        $data = [
            'user_name' => $request->user_name,
            'full_name' => $request->full_name,
        ];
        $checkNameExist = Admins::where('user_name', $request->user_name)->first();
        if ($checkNameExist) {
            return back()->with('error', 'User đã tồn tại');
        } else {
            //  Store data in database
            Admins::create($data);

            // 
            return redirect()->route('admins.list');
        }
    }

    public function editGetAdmins($id)
    {
        $admin = Admins::where('id', $id)->first();
        return view('backend.admins.edit', compact('admin'));
    }
    public function editPostAdmins(Request $request, $id)
    {
       
        $admin = Admins::where('id', $id)->first();
        $admin->user_name = $request->user_name;
        $admin->full_name = $request->full_name;      
        $admin->updated_at = Carbon::now();   
        // dd($request->is_active);
        $admin->save();
        
        return redirect()->route('admins.list');
    }
    public function deleteAdmins($id)
    {
        Admins::destroy($id);
        return redirect()->route('admins.list');

    }
}
