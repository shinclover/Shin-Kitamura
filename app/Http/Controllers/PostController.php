<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recipe; 
use App\Http\Requests\PostRequest;
use Auth;
use App\Models\Comment; // モデルのパスに応じて調整
use Cloudinary;




class PostController extends Controller
   {
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->latest()->limit(20)->get();

      
        // 最新の20件の料理レシピを取得

        return view('posts.index', compact('keyword'))->with([
            'test' => 'string',
            'posts' => $posts,  // レシピデータをビューに渡す
        ]);
    }
    // public function index(Post $post)
    // {
    //     return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
  

   public function create(Category $category)
   {
       //dd($category->get());
   return view('posts.create')->with(['categories' => $category->get()]);
    //return view('/posts/show1');  //create.blade.phpを表示
   }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        dd($input_post);
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function store(PostRequest $request, Post $post)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        //dd($image_url); 
        $input = $request['post'];
        $input += ['image_url' => $image_url]; 
        $input['user_id'] =Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
        
        
       
    }
      public function show1(Post $post)
   {
       // 投稿とそのコメントを取得
$comments = Comment::where('post_id',$post->id)->get();
   return view('posts.show1')->with(['post' => $post,'comments'=>$comments]);
   return view('/posts/show1')->with(['post' => $post]);
    //return view('/posts/show1');  //create.blade.phpを表示
   }
   
    public function show(Post $post)
   {
   return view('posts.show')->with(['post' => $post]);
   }
   
    }
