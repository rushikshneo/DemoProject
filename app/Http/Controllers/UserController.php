<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{
     function __construct()
    {
         // $this->middleware('permission: user-list');
         // $this->middleware('permission:user-create', ['only' => ['create','store']]);
         // $this->middleware('permission:user-edit',   ['only' => ['edit','update']]);
         // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $users = User::orderBy('id','DESC')->paginate(5);
        $user_role=User::select('role','id')->get();
        // dd($user_role);
        return view('pages.UserManagement.index',compact('users','user_role'));
    }  
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('pages.UserManagement.create',compact('roles'));
    } 

    public function store(Request $request)
    {
       $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:password_confirmation',
            
        ]);
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                         ->with('success','User created successfully');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'    =>  'required|email|unique:users,email,'.$id,
            'password' =>  'same:password_confirmation',
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
            $input['status'] = $input['status'];
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                         ->with('success','User updated successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('pages.UserManagement.edit',compact('user','roles','userRole'));
    }

    public function destroy($id)
    {
       User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
