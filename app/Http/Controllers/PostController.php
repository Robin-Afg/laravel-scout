<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['show','search']]);
    }


    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $user = Auth::user();

        $post = $user->posts()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('posts.show', $post->id);


    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.show')->withPost($post);
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit')->withPost($post);
    }

    public function update(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        
        return redirect()->route('posts.show', $post->id);

    }

    public function destroy($id){
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    public function search(Request $request){
        if($request->has('q')){
            $request->flashOnly('q');
            $results = Post::search($request->q)->get();
        }else{
            $results = [];
        }
        return view('posts.search')->with('results', $results);
    }


}