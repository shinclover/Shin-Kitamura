<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>筋肉育成飯</title>
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
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
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