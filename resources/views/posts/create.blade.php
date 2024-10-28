<x-app-layout>
    <x-slot name="header"></x-slot>
     <style>
        .form-container {background-color:#F3FEB8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150vh; /* ビューポートの高さを100%に */
        }
        form {background-color:#FEFCE8;
            max-width: 600px; /* フォームの最大幅 */
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>

    <div class="form-container">
       <form action="/posts" method="POST" enctype="multipart/form-data">
             @csrf
        <h1>レシピ登録</h1>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                 <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
               <label for="recipe-select">Choose a recipe :</label>

           <select name="post[category_id]" id="recipe-select">
            <option value="">--Please choose an option--</option>
           @foreach($categories as $category)
           <option value={{ $category->id }}>{{ $category->name }}</option>
           @endforeach
           </select>

            </div>
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
                <style>
                textarea#howto {
                    width: 100%; /* 幅を100%に */
                    height: 200px; /* 高さを200pxに */
                    padding: 10px; /* 内側のパディング */
                    border: 1px solid #ccc; /* 枠線 */
                    border-radius: 5px; /* 角を丸める */
                    resize: vertical; /* 垂直方向にリサイズ可能 */
                }
            </style>
            </div>
           <div class="zairyou">
           <h2>材料</h2>
          <textarea name="post[zairyou]">{{ old('post.zairyou') }}</textarea>
         <p class="title__error" style="color:red">{{ $errors->first('post.zairyou') }}</p>
         <style>
        textarea {
            width: 100%; /* 幅を100%に */
            height: 70px; /* 高さを600pxに */
            padding: 10px; /* 内側のパディング */
            border: 1px solid #ccc; /* 枠線 */
            border-radius: 5px; /* 角を丸める */
            resize: vertical; /* 垂直方向にリサイズ可能 */
        }
         </style>
       
            <div class="image">
                <input type="file" name="image">
            </div>
            <!-- ここまで追加 -->
          
            <input type="submit" value="保存"/>
        </form>


</x-app-layout>
