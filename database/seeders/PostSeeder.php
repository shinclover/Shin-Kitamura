<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    
    public function run(): void
    {
       DB::table('posts')->insert([
                'title' => '命名の心得',
                /*'cook_id'=>1,*/
                'category_id'=> 1,
                'user_id'=>1,                       
                'tyourizikan'=>1,                     
                'karori'=>1,                          
                'enbun'=>1,                          
                'tanpakusitu'=>1,                      
                'sisitu'=> 1,                          
                'tansuikabutu'=>1,                  
                'syokuensoutouryou'=>1,                 
                'tousitu'=>1,                           
                'tukurikata'=>'焼く',   
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),  
        ]);
    }
}
