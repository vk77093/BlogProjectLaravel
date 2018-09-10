<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comments;
use App\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
      $postCount=Post::count();
      $cmtCount=Comments::count();
      $catCount=Categories::count();
      $userCount=User::count();
      return view('dashbord',compact('postCount','cmtCount','catCount','userCount'));
    }
}
