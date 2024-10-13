<!DOCTYPE HTML>
<html lang="ja">
<head>
    <!--<script src="/node_modules/chart.js/dist/chart.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--<script src="path/to/chartjs/dist/chart.umd.js"></script>-->
    <!--<script src="/node_modules/chart.js/dist/Chart.js"></script>-->
    <!--<script type="module" src="acquisitions.js"></script>-->
    <!--<script type="text/javascript" src="/node_modules/chart.js/dist/Chart.min.js"></script>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>筋肉育成飯</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1f62fb1d36.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {background-color:#FEFCE8;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
           /*min-height: 100vh;*/
            margin: 0;
            text-align: center;
        }
        .liked {
            color: orangered;
            transition: .2s;
        }
        .like-btn{
            cursor: pointer;
        }
        .flexbox {
            align-items: center;
            display: flex;
        }
        .count-num {
            font-size: 20px;
            margin-left: 10px;
        }
        .fa-star {
            font-size: 30px;
        }
        .content, .footer, .edit {
            margin: 20px 0;
        }
        .nutrients {
            display: flex;
            flex-wrap: wrap; /* 行が足りなくなった場合に折り返す */
            gap: 10px; /* 要素間の間隔 */
        }
    .container {
            display: flex; /* フレックスボックスを使用 */
            justify-content: flex-end; /* 右端に揃える */
            align-items: center; /* 縦方向の中央に揃える */
            height: 10vh; /* コンテナの高さを100vhに設定（必要に応じて調整） */
        }
        .content {
            flex: 1; /* 左側のコンテンツは残りのスペースを占める */
            margin-right: 20px; /* コメントセクションとの間にスペースを追加 */
        }
        .comments-section {
            width: 300px; /* コメントセクションの幅を指定 */
            padding: 10px; /* 内側のパディング */
            border: 1px solid #ddd; /* 枠線を追加 */
            border-radius: 5px; /* 角を丸くする */
            background-color: #f9f9f9; /* 背景色を設定 */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        strong {
            color: #333;
        }
        small {
            color: #999;
        }
    </style>
</head>
<x-app-layout>
    <x-slot name="header"></x-slot>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
    <div class="post-details">
        <a href="/categories/{{ $post->category->id }}" class='no-underline text-black'>{{ $post->category->name }}</a>

        <p>Category: {{ $post->category_id }}</p>
        <p>調理時間: {{ $post->tyourizikan }} min</p>
        <p>カロリー: {{ $post->karori }} kcal</p>
        
        <div class="nutrients grid place-items-center grid-cols-6">
            <p>塩分: {{ $post->enbun }} g</p>
            <p>タンパク質: {{ $post->tanpakusitu }} g</p>
            <p>脂質: {{ $post->sisitu }} g</p>
            <p>炭水化物: {{ $post->tansuikabutu }} g</p>
            <p>食塩相当量: {{ $post->syokuensoutouryou }} g</p>
            <p>糖質: {{ $post->tousitu }} g</p>
        </div>
        <div class='flex justify-center'>
        <div class='w-[600px]'>
       <canvas id="polarChart" ></canvas>
       </div>
       </div>
       <div class='flex justify-center'>
       <div class='w-[600px]'>
        <h2>作り方</h2>
        <p>{{ $post->tukurikata }}</p>
        <h2>材料</h2>
        <p>{{ $post->zairyou }}</p>
        </div>
        </div>
    </div>
</div>

        </div> 
        <div>
<img src="{{ $post->image_url }}" alt="画像が読み込めません。" style="width: 300px; height: auto;">
        </div>

        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <h1></h1>
        <div><p>{{$post->content}}</p></div> 

        @auth
            @if($post->isLikedByAuthUser())
                <div class="flexbox">
                    <i class="fa-solid fa-star like-btn liked" id={{$post->id}}></i>
                    <p class="count-num">{{$post->likes->count()}}</p>
                </div>
            @else
                <div class="flexbox">
                    <i class="fa-solid fa-star like-btn" id={{$post->id}}></i>
                    <p class="count-num">{{$post->likes->count()}}</p>
                </div>
            @endif
        @endauth

        @guest
            <p>loginしていません</p>
        @endguest
               <h2>コメント</h2>
        <form action="/comments" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="comments" required style="width: 100%; height: 150px;"></textarea>
            <button type="submit">コメントする</button>
        </form>
      <div class="container">
    <div class="content">
        <!-- 他のコンテンツ -->
    </div>
    <div class="comments-section">
        <h3>コメント</h3>
        @if ($comments->count())
            <ul>
                @foreach ($comments as $comment)
                    <li>
                        <strong>{{ $comment->user->name }}:</strong>
                        <p>{{ $comment->comments }}</p>
                        <small>{{ $comment->created_at->format('Y/m/d H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>コメントはまだありません。</p>
        @endif
    </div>
</div>
        <script>
           // import Chart from 'chart.js/auto';
           
                      let polarCtx = document.getElementById("polarChart");
        let polarConfig = {
            type: 'bar', // 棒グラフ
            data: {
                labels: ['塩分', 'タンパク質', '脂質', '炭水化物', '食塩相当量', '糖質'],
                datasets: [{
                    label: '栄養成分',
                    // labelを削除
                    data: [
                        {{ $post->enbun }},
                        {{ $post->tanpakusitu }},
                        {{ $post->sisitu }},
                        {{ $post->tansuikabutu }},
                        {{ $post->syokuensoutouryou }},
                        {{ $post->tousitu }}
                    ],
                    backgroundColor: [
                        '#ff0000',
                        '#0000ff',
                        '#ffff00',
                        '#008000',
                        '#ffa500',
                    ]
                }]
            },
        };
        
        let polarChart = new Chart(polarCtx, polarConfig);

        
            const likeBtn = document.querySelector('.like-btn');
            likeBtn.addEventListener('click', async (e) => {
                const clickedEl = e.target;
                clickedEl.classList.toggle('liked');
                const postId = e.target.id;
                const res = await fetch('/post/like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ post_id: postId })
                })
                .then((res) => res.json())
                .then((data) => {
                    clickedEl.nextElementSibling.innerHTML = data.likesCount;
                })
                .catch(() => alert('処理が失敗しました。画面を再読み込みし、通信環境の良い場所で再度お試しください。'))
            });
           
        </script>
    </body>
</x-app-layout>
