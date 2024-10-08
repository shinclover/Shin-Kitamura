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
        Schema::create('posts', function (Blueprint $table) {
             $table->id();
             $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
             $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            /* $table->foreignId('cook_id')->constrained('cooks')->onDelete('cascade'); */
             $table->string('title', 50);
             $table->string('image_url')->nullable();
             $table->float('tyourizikan');
             $table->float('karori');
             $table->float('enbun');
             $table->float('tanpakusitu');
             $table->float('sisitu');
             $table->float('tansuikabutu');
             $table->float('syokuensoutouryou');
             $table->float('tousitu');
             $table->string('tukurikata');
             $table->string('zairyou');
             $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
