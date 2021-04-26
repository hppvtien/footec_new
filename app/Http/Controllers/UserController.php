<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\groups;
use App\Models\group_user;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được bỏ trống.', 
            'slug.required' => 'Đường dẫn tĩnh không được bỏ trống.',
        ];
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
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
        $group_user = Group_user::get();
        $group = Groups::get();
        return view('backend.users.add',compact('group_user','group'));
    }
    public function addPostUser(Request $request)
    {
        $user_id = Auth::user();
     
        $this->validate($request,
            [
                'user_name'  => 'required',
                'password' => 'required',
                'phone'  => 'required',
                
            ],
            [
                'user_name'           => 'User namememememe',
                'password' => 'passwordddddddddđ',
                'phone'           => 'Phonenenenene',
                
            ]
        );
       
        $data = [
            'user_name' => $request->user_name,
            'password' => md5($request->password),
            'full_name' => $request->full_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'active_time' => date('Y-m-d H:i:s' , strtotime($request->active_time)),
            'ukey' => $request->ukey,
            'is_active' => $request->is_active,
            'invite_id' => $request->invite_id,
            'created_user' => $user_id->id,
            'perms' => json_encode($request->perms),
            'verify_info' => '1'
        ];
        $insert_User = User::create($data);
        if($insert_User){
            $data_group_user = [
                'group_id' => ($request->group_id) ? $request->group_id : 0,
                'user_id' => $insert_User->id,
            ];
            group_user::create($data_group_user);
        } 
        return redirect()->route('user.list');
       
        // dd($insert_User->id);
        
    }

    public function editGetUser($id)
    {
        $user = User::first();
        return view('backend.users.edit', compact('user'));
    }

    public function editPostUser(Request $request, $id)
    {

        $data = User::where('id', $id)->first();
        $data->user_name = $request->user_name;
            $data->password = md5($request->password);
            $data->full_name = $request->full_name;
            $data->age = $request->age;
            $data->gender = $request->gender;
            $data->phone = $request->phone;
            $data->active_time = date('Y-m-d H:i:s' , strtotime($request->active_time));
            $data->ukey = $request->ukey;
            $data->is_active = $request->is_active;
            $data->invite_id = $request->invite_id;
            $data->created_user = 1;
            $data->verify_info = '1';


        $data->updated_at = Carbon::now();
        // dd($request->is_active);
        $data->save();

        return redirect()->route('user.list');
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('user.list');

    }
}
