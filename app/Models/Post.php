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

}
