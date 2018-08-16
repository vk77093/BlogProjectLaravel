<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EdituserRequest;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles=Role::lists('name','id')->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      //User::create($request->all());

        //return $request->all();
        //echo "the Store Method";
        // if($request->file('photo_id')){
        //   return "photo exists";
        // }else{
        //   return "photo is not added";
        // }
        if(trim($request->password=='')){
          $input=$request->except('password');

        }else {
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }

        if($file=$request->file('photo_id')){
          $name=time().$file->getClientOriginalName();
          $file->move('images',$name);
          $photo=Photo::create(['file'=>$name]);
          $input['photo_id']=$photo->id;
        }

        User::create($input);
        Session::flash('create_user','You succesfully create the User');
       return redirect('/admin/users');
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
      $user=User::find($id);
       $roles=Role::lists('name','id')->all();
        return view('admin.users.update',compact('user','roles'));
          echo "hello buddy";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EdituserRequest $request, $id)
    {
      //  return view('admin.users.update');
    //  return $request->all();
    if(trim($request->password=='')){
      $input=$request->except('password');
    }else{
      $input=$request->all();
      //$input['password']=bcrypt($request->password);
    }
    $user=User::findOrFail($id);
$input=$request->all();
    if($file=$request->file('photo_id')){
      $name=time().$file->getClientOriginalName();
      $file->move('images',$name);
      $photo=Photo::create(['file'=>$name]);
      $input['photo_id']=$photo->id;
    }
    $input['password']=bcrypt($request->password);
    $user->update($input);
    Session::flash('update_user','You recently updated the User');
    return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id)->delete();
        Session::flash('deleted_user','You succesfully deleted the user');
        return redirect('/admin/users');

        //return "data can be delete";
    }
}
