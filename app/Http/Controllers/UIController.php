<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;


class UIController extends Controller
{
    public function index(Request $request)
    {
      if (Auth::check() && superAdmin()) {
        return redirect()->route('adminHome');
      }
      $posts = Post::orderBy('id','desc')->paginate(20);
      $arr['posts'] = $posts;

      return view('welcome',$arr);
    }
    public function post(Request $request, Post $post)
    {
      return view('post',compact('post'));
    }

}
