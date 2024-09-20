<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('cooks')->insert([
        'name'=>"天丼",
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(), 
         ]);/
    }
}
