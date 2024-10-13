<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; 
use App\Models\Post;// モデルのパスに応じて調整


class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'comments' => 'required|string|max:1000',
    ]);

    Comment::create([
        'post_id' => $request->post_id,
        'user_id' => auth()->user()->id,
        'comments' => $request->comments,
    ]);

    return redirect()->back()->with('success', 'コメントが追加されました。');
}

}
