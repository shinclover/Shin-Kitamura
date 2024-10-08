<!-- body内だけを表示しています。 -->
<x-app-layout>
    <x-slot name="header">
        </x-slot>
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
        
        
        

    </style>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class='content__body'>
               <div class="tyourizikan">
                <h2>調理時間</h2>
                <input type="number" step="1" name="post[tyourizikan]"  value="{{ old('post.tyourizikan') }}"/>min
                 <p class="title__error" style="color:red">{{ $errors->first('post.tyourizikan') }}</p>
            </div>
             <div class="karori">
                <h2>カロリー</h2>
                <input type="number" step="0.01" name="post[karori]"  value="{{ old('karori') }}"/>kcal
                 <p class="title__error" style="color:red">{{ $errors->first('post.karori') }}</p>
            </div>
             <div class="enbun">
                <h2>塩分</h2>
                <input type="number" step="0.01" name="post[enbun]"  value="{{ old('enbun') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.enbun') }}</p>
            </div>
             <div class="tanpakusitu">
                <h2>タンパク質</h2>
                <input type="number" step="0.01" name="post[tanpakusitu]"  value="{{ old('tanpakusitu') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.tanpakusitu') }}</p>
            </div>
             <div class="sisitu">
                <h2>脂質</h2>
                <input type="number" step="0.01" name="post[sisitu]"  value="{{ old('sisitu') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.sisitu') }}</p>
            </div>
             <div class="tansuikabutu">
                <h2>炭水化物</h2>
                <input type="number" step="0.01" name="post[tansuikabutu]"  value="{{ old('tansuikabutu') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.tansuikabutu') }}</p>
            </div>
             <div class="syokuensoutouryou">
                <h2>食塩相当量</h2>
                <input type="number" step="0.01" name="post[syokuensoutouryou]"  value="{{ old('syokuensoutouryou') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.syokuensoutouryou') }}</p>
            </div>
             <div class="tousitu">
                <h2>糖質</h2>
                <input type="number" step="0.01" name="post[tousitu]"  value="{{ old('tousitu') }}"/>g
                 <p class="title__error" style="color:red">{{ $errors->first('post.tousitu') }}</p>
            </div>
            <div class="tukurikata">
                <h2>作り方</h2>
                <textarea name="post[tukurikata]" id="howto"></textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.tukurikata') }}</p>
                </div>
           <div class="zairyou">
           <h2>材料</h2>
          <textarea name="post[zairyou]">{{ old('post.zairyou') }}</textarea>
         <p class="title__error" style="color:red">{{ $errors->first('post.zairyou') }}</p>
        </div>
        <div>
                <input type='hidden' name='post[body]' value="{{ $post->body }}">
        </div>
        <div>
            <input type="submit" value="保存">
        </div>
        </form>
    </div> 
    <style>
        textarea {
            width: 100%; /* 幅を100%に */
            height: 95px; /* 高さを600pxに */
            padding: 10px; /* 内側のパディング */
            border: 1px solid #ccc; /* 枠線 */
            border-radius: 5px; /* 角を丸める */
            resize: vertical; /* 垂直方向にリサイズ可能 */
        }
        textarea#howto {
                    width: 100%; /* 幅を100%に */
                    height: 200px; /* 高さを200pxに */
                    padding: 10px; /* 内側のパディング */
                    border: 1px solid #ccc; /* 枠線 */
                    border-radius: 5px; /* 角を丸める */
                    resize: vertical; /* 垂直方向にリサイズ可能 */
                }
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

         </style>
</body>
</x-app-layout>