<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTag;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['posts'] = Post::paginate(20);

        return view('admin.posts.index', $arr);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.addEdit');
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
          'title'=> 'required|max:255',
          'description'=> 'required|max:64000',
          'image'=> 'required'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->descriptionText = $request->descriptionText;
        $post->image = $request->image->store('images');
        $post->userId = Auth::id();

        $post->save();

        if ($request->tags != null) {
          foreach ($request->tags as $tag) {
            $postTag = new PostTag;
            $postTag->title = $tag;
            $postTag->postId = $post->id;
            $postTag->userId = Auth::id();
            $postTag->save();
          }
        }

        return statusTo('post published....' , route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return status('post deleted');

    }
}
