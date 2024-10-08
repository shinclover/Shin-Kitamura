<x-app-layout>
    <style>
        body {background-color:#CCFFCC;
            font-family: 'Nunito', sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* カード間のスペース */
        }
        .recipe-card {
            flex: 1 1 calc(33.333% - 20px); /* 3列レイアウト */
            box-sizing: border-box;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            color:#000000;
            min-width: 250px; /* カードの最小幅を設定 */
            cursor: pointer;
        }
        .recipe-card:hover {
            transition-duration: 0.3s;
            background-color:pink;
        }
        .recipe-card h3 {
            margin-top: 0;
        }
        .recipe-card p {
            margin: 5px 0;
            
        }
         .link {
             text-decoration-line: none;
        }
    </style>
    <h1>料理レシピ一覧</h1>
　　<div>
    　　<form action="" method="GET">
        <input type="text" name="keyword" value="{{ $keyword }}">
        <input type="submit" value="検索">
        </form>
    </div>
<!-- Test Variable Display -->
    <p>Test Value: {{ $test ?? 'Default value' }}</p>

    <!-- Display Recipe's Details in 3 columns -->
    <div class="container">
        @if (isset($posts) && $posts->count())
            @foreach ($posts as $post)
                
                 <div> 
                <a href="/posts1/{{ $post->id }}" class='link'>
                   
                    <div class="recipe-card">
                        <h3> {{ $post->title }}</h3>
                        <p>{{$post->user->name}}</p>
                        <p>{{$post->created_at}}</p>
                        <p>
                            <i class="fas fa-heart" style="color: red;"></i> <!-- ハートアイコン -->
                            {{ $post->likes->count() }} <!-- いいね数 -->
                        </p>
                   </div>
                   
               <p class='body'>{{ $post->body }}</p>
                   
                </a> 
                  <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                </form>  <!-- その他のレシピ情報があれば  <!-- 以下を追記 -->
                </div>  
               
                <script>
                    function deletePost(id) {
                        'use strict'
                
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
            @endforeach
        @else
            <p>表示するレシピがありません。</p>
        @endif
    </div>
</x-app-layout>
