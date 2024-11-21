<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recipe; 
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment; // モデルのパスに応じて調整
use Cloudinary;
use App\Models\Favorite;



class PostController extends Controller
   {
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $posts = Post::where('title', 'LIKE', "%{$keyword}%") 
        ->orWhereHas('category', function ($query) use ($keyword) { $query->where('name', 'LIKE', "%{$keyword}%"); }) 
        ->limit(20) ->get();

       
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
        //dd($input_post);
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
        $input = $request['post'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
        }
        $input['user_id'] =Auth::id();
        $post->fill($input)->save();
        return redirect('/posts1/' . $post->id);
         }
         
      public function show1(Post $post)
   {
       // 投稿とそのコメントを取得
$comments = Comment::where('post_id',$post->id)->get();
   return view('posts.show1')->with(['post' => $post,'comments'=>$comments]);
   return view('show1', compact('post'));
   //return view('/posts/show1')->with(['post' => $post]);
    //return view('/posts/show1');  //create.blade.phpを表示
   }
   
   public function show(Post $post)
{
    // Postに関連する画像を取得
    $images = $post->images; // ここでPostモデルにimagesリレーションを定義していると仮定

    return view('posts.show')->with([
        'post' => $post,
        //'images' => $images, // 画像情報も渡す
    ]);
}
   public function favorite()
    {
        $user_id = \Auth::id();
        //dd(Post::)
        $dates=User::find($user_id)->favorites()->get();
        return view('posts.favorite')->with(['posts' => $dates]);  
    }
   public function myPosts()
    {
        $posts = Auth::user()->posts; // 現在のユーザーの投稿を取得
        return view('posts.my-posts', compact('posts'));
    }

  }
    
