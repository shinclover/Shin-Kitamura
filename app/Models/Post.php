<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
   public function getPaginateByLimit(int $limit_count = 10)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
  return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
protected $fillable = [
    'title',
    'body',
    'category_id',
    'image_url',
    'category_id',
    'user_id',
    'tyourizikan',
    'karori',
    'enbun',
    'tanpakusitu',
    'sisitu',
    'tansuikabutu',
    'syokuensoutouryou',
    'tousitu',
    'tukurikata',
    'zairyou'
];
// Categoryに対するリレーション

//「1対多」の関係なので単数系に
public function category()
{
    return $this->belongsTo(Category::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
public function likes()
    {
        return $this->hasMany(Like::class);
    }
    //自身がいいねしているのかどうか判定するメソッド（しているならtrue,していないならfalseを返す）
    public function isLikedByAuthUser() :bool
    {
        //認証済ユーザーid（自身のid）を取得
        $authUserId = \Auth::id();
        //空の配列を定義。後続の処理で、いいねしたユーザーのidを全て格納していくときに使う。
        $likersArr = array();
       
        //$thisは言葉の似た通り、クラス自身を指す。具体的にはこのPostクラスをインスタンス化した際の変数のことを指す。（後続のビューで登場する$postになります）
        foreach($this->likes as $postLike){
            //array_pushメソッドで第一引数に配列、第二引数に配列に格納するデータを定義し、配列を作成できる。
            //今回は$likersArrという空の配列にいいねをした全てのユーザーのidを格納している。
            array_push($likersArr,$postLike->user_id);

        }
        //in_arrayメソッドを利用し、認証済ユーザーid（自身のid）が上記で作成した配列の中に存在するかどうか判定している
        if (in_array($authUserId,$likersArr)){
            //存在したらいいねをしていることになるため、trueを返す
            return true;
        }else{
            return false;
        }
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class); 
        //return $this->belongsToMany(Users::class, 'favorites');// PostFavoriteに変更
    }

    // 自身がお気に入りにしているかどうか判定するメソッド
    public function isFavoritedByAuthUser() : bool
    {
        // 認証済ユーザーidを取得
        $authUserId = \Auth::id();

        // お気に入りしたユーザーのidを格納する配列
        $favoritersArr = [];

        // $thisはPostクラスのインスタンスを指す
        //dd($favoritersArr);
        // foreach ($this->favorites as $postFavorite) {
        //     // お気に入りしたユーザーのidを配列に格納
        //     $favoritersArr[] = $postFavorite->user_id;
        // }
       if ($this->favorites) {
        foreach ($this->favorites as $Favorite) {
            // お気に入りしたユーザーのidを配列に格納
            $favoritersArr[] = $Favorite->user_id;
        }
    }
        // in_arrayメソッドで認証済ユーザーidが配列に存在するか判定
        return in_array($authUserId, $favoritersArr);
    }
    
  public function comments()
{
    return $this->hasMany(Comment::class);
}
public function images()
    {
        return $this->hasMany(Image::class); // Imageモデルと関連付け
    }
  public static function getPostWithImage()  
  {
     return self::with('images')->get();
  }
  
}