<?php


use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\CommentController;


//Route::get('/', function () {
        //return view('welcome');
    
    //Route::get('/register', [RegisteredController::class, 'showRegistrationForm'])->name('register');
    
//});
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', [PostController::class, 'index']);
Route::get('/recipes', [PostController::class, 'index'])->name('recipes.index');
Route::resource('categories', CategoryController::class);
Route::resource('recipes', RecipeController::class);
Route::get('/serch',[UsersController::class, 'serch']);
Route::get('/users', [UsersController::class, 'index']);
Route::controller(CommentController::class)->middleware(['auth'])->group(function(){});
Route::post('/post/like', [LikeController::class, 'likePost']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');




//Route::post('/like',function(){
    //return view('welcome');
//});


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/posts', [PostController::class, 'store'])->name('store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    //Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/posts1/{post}', 'show1')->name('show1');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::get('/posts/{post}', [PostController::class, 'show1'])->name('posts.show1');

   // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.show1');
    //Route::post('/posts', [PostController::class, 'store']);  //画像を含めた投稿の保存処理
    //Route::get('/posts/{post}', [PostController::class, 'show']); //投稿詳細画面の表示
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








require __DIR__.'/auth.php';

