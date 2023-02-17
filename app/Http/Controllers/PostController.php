<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

// php artisan make:controller --resource PostController2

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // receiving post super global values
        // return $request->all();

        // 1st way
        Post::create($request->all());

        return redirect('/posts');

        // 2nd way
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // 3rd way
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();
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
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
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

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,
    $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // CUSTOM CONTROLLER

    public function contact()
    {
        $people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria', 'Patryk'];

        return view('contact', compact('people'));
    }

    // with compact is much easier to pass multiple params
    public function show_post($id)
    {
        // return view('post')->with('id', $id);

        return view('post', compact('id'));
    }
}
