<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.create_user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [
            'name' => 'required',
            'email'=> 'required|email',
            'password'=>'required',
            'role'  => 'required'
        ]);

        $user = new User();
        if ($request->hasFile('avatar')) {
            $avatar = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $avatar);
            $user->avatar = $avatar;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $role = Role::find($request->role);
        $user->roles()->attach($role);

        return redirect('users')
                ->with('type','success')
                ->with('msg','User Added Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.edit_user',compact('user','roles'));
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
        $this->validate(request(), [
            'name' => 'required',
            'email'=> 'required|email',
            'role'  => 'required'
        ]);

        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            $avatar = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $avatar);
            $user->avatar = $avatar;
        }
        if($request->password != ""){
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $role = Role::find($request->role);
        $user->deletePrevRole($role->id,$user->id);
        $user->roles()->attach($role);

        return redirect('users')
                ->with('type','success')
                ->with('msg','User updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()
                ->with('type','success')
                ->with('msg','User Deleted Successfully.');
    }
}
