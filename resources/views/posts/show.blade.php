<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="header">
        </x-slot>
    <body>
        <h1 class="title">
            {{ $post->title }}
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        </h1>
        <div class="content">
            <div class="post-details">
        <h1>{{ $post->title }}</h1>
        <p>Category: {{ $post->category_id }}</p>
        <p>調理時間: {{ $post->tyourizikan }} min</p>
        <p>カロリー: {{ $post->karori }} kcal</p>
        <p>塩分: {{ $post->enbun }} g</p>
        <p>タンパク質: {{ $post->tanpakusitu }} g</p>
        <p>脂質: {{ $post->sisitu }} g</p>
        <p>炭水化物: {{ $post->tansuikabutu }} g</p>
        <p>食塩相当量: {{ $post->syokuensoutouryou }} g</p>
        <p>糖質: {{ $post->tousitu }} g</p>
        <h2>作り方</h2>
        <p>{{ $post->tukurikata }}</p>
        <h2>材料</h2>
           <p>{{ $post->zairyou }}</p>
    </div>
        </div> 
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
       
    </body>
    </x-app-layout>
</html>