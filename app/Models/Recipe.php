<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ingredients', 'instructions', 'category_id'];

    // レシピは1つのカテゴリーに属する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

