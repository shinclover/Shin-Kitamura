<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('categories')->insert([
        'name'=>"鶏肉料理",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
        DB::table('categories')->insert([
        'name'=>"豚肉料理",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
         DB::table('categories')->insert([
        'name'=>"牛肉料理",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
         DB::table('categories')->insert([
        'name'=>"魚料理",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
          DB::table('categories')->insert([
        'name'=>"野菜料理",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
          DB::table('categories')->insert([
        'name'=>"麺レシピ",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
          DB::table('categories')->insert([
        'name'=>"米・パンレシピ",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);
          }
}
