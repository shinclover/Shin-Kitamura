<x-app-layout>
    <style>
        body {
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
            min-width: 250px; /* カードの最小幅を設定 */
        }
        .recipe-card h3 {
            margin-top: 0;
        }
        .recipe-card p {
            margin: 5px 0;
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
                <div class="recipe-card">
                    <h3>レシピ名: {{ $post->title }}</h3>
                    
                <a href="/posts1/{{ $post->id }}">{{ $post->title }}</a>    <!-- その他のレシピ情報があればここに追加 -->
                </div>
            @endforeach
        @else
            <p>表示するレシピがありません。</p>
        @endif
    </div>
</x-app-layout>
