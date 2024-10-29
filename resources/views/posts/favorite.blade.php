 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <script src="https://kit.fontawesome.com/2846e14a2e.js" crossorigin="anonymous"></script>
    <style>
        .flexbox {
            display: flex;
            align-items: center;
        }
        .favorite-btn {
            cursor: pointer;
            font-size: 24px;
            color: gold;
        }
        .favorited {
            color: orange; /* お気に入り時の色 */
        }
    
        body {background-color: #CCD5AE;
            font-family: 'Nunito', sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* カード間のスペース */
        }
        .recipe-card {
        flex: 1 1 calc(33.333% - 20px); /* 3列レイアウト */
        box-sizing: border-box;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        background-color: #FEFAE0;
        color: #000000;
        min-width: 150px; /* カードの最小幅を設定 */
        cursor: pointer;
        margin-top: 10px; /* カードの上にスペースを追加 */
    　　}
        .recipe-card:hover {
            transition-duration: 0.3s;
            background-color:#C75B7A;
        }
        .recipe-card h3 {
            margin-top: 0;
        }
        .recipe-card p {
            margin: 10px 0;
        }
         .link {
             text-decoration-line: none;
        }
        
        /* お気に入り押下時の星の色 */
        .favorited {
            color: orangered;
            transition: .2s;
        }
        .flexbox {
            align-items: center;
            display: flex;
        }
        .count-num {
            font-size: 20px;
            margin-left: 10px;
            margin-top: 10px;
        }
        .fa-star {
            font-size: 30px;
            margin-top: 10px; 
        }
    　　h1 {
        text-align: center; /* テキストを中央揃え */
        margin-bottom: 20px; /* 下にスペースを追加（必要に応じて調整） */
    　　　　}
    </style>
    <x-app-layout>
    <h1>お気に入り一覧</h1>
　
<!-- Test Variable Display -->
    

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
                   
                </a>  </div>  
                 
               

   
  </head>
  <body>
    <h2></h2> <!-- タイトルを追加 -->
    <div><p>{{ $post->content }}</p></div>

    @auth
        <div class="flexbox">
            <i class="fa-solid fa-star favorite-btn {{ $post->isFavoritedByAuthUser() ? 'favorited' : '' }}" id="{{ $post->id }}"></i>
            <p class="count-num">{{ $post->favorites->count() }}</p>
        </div>
    @endauth

    @guest
        <p>ログインしていません</p>
    @endguest

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRFトークンを追加 -->

    
    </script>
</body>

</html>
            @endforeach
             <script>
        const favoriteBtns = document.querySelectorAll('.favorite-btn');

        favoriteBtns.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                const clickedEl = e.target;
                clickedEl.classList.toggle('favorited');
                const postId = clickedEl.id;

                try {
                    const res = await fetch('/post/favorite', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ post_id: postId })
                    });

                    if (!res.ok) throw new Error('Network response was not ok');
                    
                    const data = await res.json();
                    clickedEl.nextElementSibling.innerHTML = data.favoritesCount; // お気に入り数を更新
                } catch (error) {
                console.log(error);
                    alert('処理が失敗しました。画面を再読み込みし、通信環境の良い場所で再度お試しください。');
                }
            });
        });
    </script>
        @else
            <p>表示するレシピがありません。</p>
        @endif
    </div>
</x-app-layout>
