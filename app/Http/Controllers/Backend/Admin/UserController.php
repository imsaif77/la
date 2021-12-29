<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use DataTables;

    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       

        if ($request->ajax()) {

            
            
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('confirmed_label', function ($q)  {
        
                        if($q->email_verified_at !=NULL){

                             $actionBtn = '<label class="label label-success"><a>Yes</a><label>';
                             return $actionBtn;


                        }else{
                            $actionBtn  = '<a href="javascript:void(0)" class="btn btn-danger btn-sm" title="confirmed" onclick="confirmed('.$q->id.')" >
                            No</a>';
                            return $actionBtn;



                        }

                        
                    })
                    ->addColumn('roles_label', function ($q)  {

                        
                        if(!empty($q->getRoleNames())){
                        foreach($q->getRoleNames() as $v) {
                        return '<label>'.ucfirst($v).'</label>';
                          }
                        }
                    })

                    ->addColumn('status_label', function ($q)  {
                        
                       
                            if($q->status == 1){

                                $status  = '<a href="javascript:void(0)" class="btn btn-success btn-sm" title="Inactive" onclick="Inactive('.$q->id.')" >
                                Active</a>'; 
                                return $status;

                            }else{

                                $actionBtn  = '<a href="javascript:void(0)" class="btn btn-danger btn-sm" title="confirmed" onclick="active('.$q->id.')" >
                                Inactive</a>';
                                return $actionBtn;

                                

                            }                           
                           
                        
                      
                    })

                    ->addColumn('updated_at', function ($q)  {
        
                        return $q->updated_at->diffForHumans();
                    })

                    ->addColumn('login_as', function ($q)  {

                        $loginas =  '<a  href="'.route('user.impersonate', $q->id).'" class="btn btn-info " target="_">Login As</a>';

                        return $loginas;
                    })


                    ->addColumn('action', function (User $user){
                        
                      


                        $actionBtn = '<a href="'.route('user.edit',$user->id).'" title="Edit User" class="btn btn-sm" style="color: #fff;background-color: #3DCB3A;border-color: #8ad3d3"> <i class="fa fa-edit"></i> </a> 
                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Delete User" onclick="deleteuser('.$user->id.')" ><i class="fa fa-trash ">
                        </i></a>
                      
                        ';
                        return $actionBtn;
                    })

                    ->rawColumns(['confirmed_label','roles_label','status_label','login_as','action'])
                    ->make(true);
        }

        return view('backend.auth.users.index');
            
    }


    
    // public function getUsers(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
               
    //             ->make(true);
    //     }
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.auth.users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'telegram_id' => 'required',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'confirmed' => 'required',
        ]);


    
        $input = $request->all();
        $input['email_verified_at'] = date('Y-m-d H:i:s');
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('user.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.auth.users.edit',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('backend.auth.users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'telegram_id' => 'required',
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        if($input['confirmed'] != NULL){
            $input['email_verified_at'] = date('Y-m-d H:i:s');

        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('user.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return response('User deleted successfully.', 200);

    
    }

    public function confirmed(Request $request,$id)
    {
        $input = $request->all();
        
        $input['email_verified_at'] = date('Y-m-d H:i:s');

        $user = User::find($id);
        $user->update($input);

        // User::find($id)->delete();
        return response('User Confirmed successfully.', 200);

    
    }


    public function active(Request $request,$id)
    {
        $input = $request->all();
        dd($input);
        $input['status'] = 1;

        $user = User::find($id);
        $user->update($input);

        return response('User Status is Active.', 200);

    
    }


    public function inactive(Request $request,$id)
    {
        $input = $request->all();
        
        $input['status'] = 0;

        $user = User::find($id);
        $user->update($input);

        return response('User Status is Inactive.', 200);

    
    }

    public function impersonate(User $user) 
{
    auth()->user()->impersonate($user);

    return redirect()->route('dashboard');
}

public function leaveImpersonate() 
{
    auth()->user()->leaveImpersonation();

    return redirect()->route('dashboard'); 
}
}