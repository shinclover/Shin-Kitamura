<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
             $table->float('tyourizikan');
             $table->float('karori');
             $table->float('enbun');
             $table->float('tanpakusitu');
             $table->float('sisitu');
             $table->float('tansuikabutu');
             $table->float('syokuensoutouryou');
             $table->float('tousitu');
             $table->string('tukurikata');
        //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
        
    });
  
        
    }

     public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
           
        });
    }
};
