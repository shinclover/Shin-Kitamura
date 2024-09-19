<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>新しいカテゴリー</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>新しいカテゴリーを作成</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">カテゴリー名:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">作成</button>
    </form>
    <a href="{{ route('categories.index') }}">カテゴリー一覧に戻る</a>
</body>
<head>
    <meta charset="utf-8">
    <title>レシピの作成</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>レシピの作成</h1>
    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf
        <label for="name">レシピ名:</label>
        <input type="text" id="name" name="name" required>
        <label for="ingredients">材料:</label>
        <textarea id="ingredients" name="ingredients" required></textarea>
        <label for="instructions">手順:</label>
        <textarea id="instructions" name="instructions" required></textarea>
        <label for="category_id">カテゴリー:</label>
        <select id="category_id" name="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">作成</button>
    </form>
    <a href="{{ route('recipes.index') }}">レシピ一覧に戻る</a>
</body>
<head>
    <meta charset="utf-8">
    <title>写真の掲載</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
   <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>タイトル：</p>
    <input type="text" name="title" placeholder="タイトル" required/><br>
    <p>メッセージ：</p>
    <textarea name="content" placeholder="今日も1日お疲れさまでした。" required></textarea><br>
    <p>画像：</p>
    <input type="file" name="image" accept="image/*"/><br>
    <input type="submit" value="投稿"/>
</form>
<a href="{{ route('recipes.index') }}">検索画面に戻る</a>
 <body>
</html>
