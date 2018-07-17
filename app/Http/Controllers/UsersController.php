<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(3);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        /*dd($roles);*/
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
            'role_id'=>'required',
            'is_active'=>'required'

        ]);


        $input = $request->all();

        if($file = $request->file('photo_id')){

            $file_name = time() . $file->getClientOriginalName();

            $file->move('images', $file_name);

            $photo = Photo::create(['file'=>$file_name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        Session::flash('user_created','New User has been created successfully.');
        
        return redirect('/users');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('users.show',compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'role_id'=>'required',
            'is_active'=>'required'
        ]);

        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


       

        if($file = $request->file('photo_id')){
            $file_name = time() . $file->getClientOriginalName();
            
            $file->move('images', $file_name);
            unlink(public_path() . $user->photo->file);

            $user->photo->file = $file_name;
            $user->photo->save();



            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        return redirect('/users');
    }*/


    public function update(Request $request, $id)
    {       

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'role_id'=>'required',
            'is_active'=>'required'
        ]);

        $user = User::findOrFail($id);


        if(trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


       

        if($file = $request->file('photo_id')){
            
            $file_name = time() . $file->getClientOriginalName();
            
            $file->move('images', $file_name);
            unlink(public_path() . $user->photo->file);

            $user->photo->file = $file_name;
            $user->photo->save();


            $input['photo_id'] = $user->photo->id;
        }

        $user->update($input);
        return redirect('/users');

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->photo_id == 1 && $user->is_active ==1){
            
            Session::flash('user_deactive','Please Deactivate User first to Delete');
            return redirect('/users');

        }
        elseif($user->photo_id == 1 && $user->is_active ==0){
            //echo "Default Photo and Deactive User. User will be deleted but not Image.";
            $user->delete();
            Session::flash('user_deleted','User deleted successfully');
            return redirect('/users');
        }
        elseif($user->photo_id !== 1 && $user->is_active ==1){
            //echo "Unknown Photo and Active User. So both user and photo wont be deleted.";
            //$user->delete();
            Session::flash('user_deactive','Please Deactivate User first to Delete');
            return redirect('/users');
        }
        else{
          //echo "Unknown Photo and Deactive User. So both user and photo will be deleted.";
            unlink(public_path() . $user->photo->file);
            
            $photo = Photo::findOrFail($user->photo_id);
            $photo->delete();
            
            
            $user->delete();
            Session::flash('user_deleted','User deleted successfully');
            return redirect('/users');  
        }
        
    }
}
