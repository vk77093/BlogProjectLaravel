<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Photo;
use App\Post;
use App\Comments;
use Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comment=Comments::all();
        return view('admin.comments.index',compact('comment'));
        //echo "its working";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->all();
        $user=Auth::user();
      $photos=Photo::findOrFail($user->photo->id)->file;
        $data=[
          'post_id'=>$request->post_id,
          'author'=>$user->name,
          'photos'=>$photos,
          'email'=>$user->email,
          'body'=>$request->body
        ];
        Comments::create($data);
        $request->session()->flash('cmt_msg','You Just posted the comments and its pending for approval');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $post=Post::findOrFail($id);
      // $comment=$post->comments();
      // //$comment=Comments::all();
      // return view('admin.comments.show',compact('comment'));

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
      $cmt=Comments::findOrFail($id);
      $cmt->update($request->all());
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Comments::findOrFail($id)->delete();
        return redirect('admin/comments');
    }
}
