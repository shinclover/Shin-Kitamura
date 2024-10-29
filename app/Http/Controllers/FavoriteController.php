<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;  // Favoriteモデルのインポート
use App\Models\Post;
use App\Models\User;
use Auth;

class FavoriteController extends Controller
{
    public function favoritePost(Request $request)
    {
        $user_id = \Auth::id();
        // JSのfetchメソッドで記事のIDを送信しているため受け取ります。
        $post_id = $request->post_id;

        // 自身がお気に入り済みなのか判定
        $alreadyFavorited = Favorite::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if (!$alreadyFavorited) {
            // こちらはお気に入りをしていない場合の処理です。つまり、post_favoritesテーブルに自身のID（user_id）とお気に入りした記事のID（post_id）を保存します。
            $favorite = new Favorite(); // PostLike から PostFavorite に変更
            $favorite->post_id = $post_id;
            $favorite->user_id = $user_id;
            $favorite->save();
        } else {
            // すでにお気に入りをしていた場合は、以下のように post_favorites テーブルからレコードを削除します。
            Favorite::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }

        // ビューにその記事のお気に入り数を渡すため、お気に入り数を計算します。
        $post = Post::where('id', $post_id)->first();
        $favoritesCount = $post->favorites->count(); // お気に入り数のカウント

        $param = [
            'favoritesCount' => $favoritesCount,
        ];

        // ビューにお気に入り数を渡しています。名前は上記の favoritesCount となるため、フロントで favoritesCount といった表記で受け取ることができます。
        return response()->json($param);
    }
    public function toggle(Post $post)
{
    $user = auth()->user();

    if ($post->isFavoritedByAuthUser()) {
        $post->favorites()->detach($user);
    } else {
        $post->favorites()->attach($user);
    }

    return back();
}
}