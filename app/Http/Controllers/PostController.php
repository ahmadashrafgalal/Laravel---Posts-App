<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // $allPosts = [
        //     ['id' => 1, 'title' => 'Laravel 11 CRUD 1', 'posted_by' => 'Ahmad', 'created_at' => '2021-01-01'],
        //     ['id' => 2, 'title' => 'Laravel 11 CRUD 2', 'posted_by' => 'Ashraf', 'created_at' => '2021-01-02'],
        //     ['id' => 3, 'title' => 'Laravel 11 CRUD 3', 'posted_by' => 'Galal', 'created_at' => '2021-01-03'],
        //     ['id' => 4, 'title' => 'Laravel 11 CRUD 4', 'posted_by' => 'Atea', 'created_at' => '2021-01-04'],
        //     ['id' => 5, 'title' => 'Laravel 11 CRUD 5', 'posted_by' => 'Sayed', 'created_at' => '2021-01-05'],
        // ];
        $allPosts = POST::all();
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show(Post $post){
        // dd($post);

        // ++================================================++

        // $singlePost = ['id' => 1, 'title' => 'Laravel 11 CRUD 1', 'description' => 'This is Description', 'posted_by' => 'Sayed', 'created_at' => '2021-01-05'];

        // $singlePost = POST::where('id', $post)->first();
        // OR
        // $singlePost = POST::where('id', $post)->get();
        // OR

        // $singlePost = POST::find($post);
        // if(is_null($singlePost)){
        //     return 'Post Not Found';
        // }

        // $singlePost = POST::findOrFail($post);

        // dd($singlePost);
        
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(){

        // How to get data from form
        // #########################
        // $data = $_POST;
        // return $data;        
        // $title = request('title');
        // $description = request('description');
        // $data2 = [
        //     'title' => $title,
        //     'description' => $description
        // ];

        // Store Data
        // ##########

        $data = request()->all();
        // Method 1
        // $post = new Post();
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->save();

        // Method 2
        Post::create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        return to_route('posts.index');
    }

    public function edit($post_id){
        $users = User::all();
        $post = POST::find($post_id);

        return view('posts.edit', ['users' => $users,
                                   'post' => $post]);
    }

    public function update($post_id){
        $data = request()->all();

        $post = POST::find($post_id);
        
        // $post->title = $data['title'];
        // $post->description = $data['description'];
        // $post->save();

        // OR

        POST::where('id', $post_id)->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        return to_route('posts.index');
    }

    public function destroy($post_id){
        $post = Post::find($post_id);
        $post->delete();

        // POST::where('id', $post_id)->delete();
        
        return to_route('posts.index');
    }
}
