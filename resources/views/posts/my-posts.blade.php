@extends('layouts.app')

@section('content')
@csrf 
    <h1>私の投稿</h1>
    @if ($posts->isEmpty())
        <p>投稿はありません。</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    @if ($post->image_url)
                        <img src="{{ $post->image_url }}" alt="Image for {{ $post->title }}">
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
