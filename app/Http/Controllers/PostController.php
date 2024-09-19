<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recipe; 
use App\Http\Requests\PostRequest;



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
   return view('posts.create')->with(['categories' => $category->get()]);
   }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
        ]);
    
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
    
        // 画像の保存
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
    
        return redirect()->route('posts.index')->with('success', '投稿が作成されました。');
    }
    
    }
