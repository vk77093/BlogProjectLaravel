<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Photo;
use App\Role;
use App\Categories;
use Auth;


//use App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts=Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Categories::lists('name','id')->all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
      $input=$request->all();
      $user=Auth::user();
      $user->posts();
      if($file=$request->file('photo_id')){
        $name=time().$file->getClientOriginalName();
        $file->move('images',$name);
        $photo=Photo::create(['file'=>$name]);
        $input['photo_id']=$photo->id;
      }
      $user->posts()->create($input);
      Session::flash('create_post','A new User Post Is Created');
      return redirect('/admin/posts');

        //return $request->all();
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
        $post=Post::findOrFail($id);
        $categories=Categories::lists('name','id')->all();
        return view('posts.edit',compact('post','categories'));
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
      //return $request->all()
      $input = $request->all();
  $categories=Categories::lists('name','id')->all();
        if($file=$request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        // else{
        //     $post = Post::findOrFail($id);
        //     $input['photo_id'] = $post->photo->id;
        // }

        Auth::user()->posts()->where('id',$id)->first()->update($input);
        Session::flash('update_psot','One Post is Updated');
      // posts()->where('id',$id)->first()->update($input);
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
      //  unlink('public_path()'.$post->photo->file);
        $post->delete();
        Session::flash('deleted_post','You sucessfully deleted the Post');
        return redirect('/admin/posts');
    }
}
