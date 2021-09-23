<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserCommentController;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[HomeController::class,'home'])->name('home.index');

Route::view('/home', 'home.index');

Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/secret', [App\Http\Controllers\HomeController::class, 'secret'])
->name('home.secret')
->middleware('can:home.secret');


// Route::get('/posts/{id}',function($id){
//     return 'post'.$id;
// })->where(['id'=>'[0-9]+'])->name('home.posts');
// $posts=[
//         1 =>[
//             'title'=>'test1',
//             'contact' => 'contact1',
//             'is_new' => true,
//             'has_comments' => true
//         ],
//         2 =>[
//             'title'=>'test2',
//             'contact' => 'contact2',
//             'is_new' => false
//         ],

// ];

// Route::get('/posts',function() use($posts) {
//     return view('posts.index',['posts'=> $posts]);
// });

// Route::get('/post-show/{id}',function($id) use($posts) {

//     abort_if(!isset($posts[$id]),404);

//     return view('posts.show',['posts'=>$posts[$id]]);

// })->name('post.show');

// Route::get('/fun/response', function() use($posts){
//     return response($posts, 201)
//     ->header('Content-Type', 'application/json')
//     ->cookie('MY_COOKIE','MAULIK',3600);
// });

// Route::get('/fun/redirect', function(){
//     return redirect('/contact');
// });

// Route::get('/fun/back', function(){
//     return back();
// });

// Route::get('/fun/name-route', function(){
//     return redirect()->route('post.show',['id' => 1]);
// });

// Route::get('/fun/away', function(){
//     return redirect()->away('http://google.co.in');
// });

// Route::get('/fun/json', function() use($posts){
//     return response()->json($posts);
// });

// Route::prefix('/fun')->name('fun.')->group(function(){
//     // remove /fun prefix below route
//     Route::get('/download', function(){
//         return response()->download(public_path('/path'),'face.jpg');
//     })->name('download');
// });

// Route::get('/query',function() use($posts) {
//     // dd(request()->all());
//     // dd((int)request()->input('page',10));
//     dd((int)request()->query('page',10));

// });
// Route::get('/single', AboutController::class);

Route::get('/contact-middleware',function(){
    return view('home.contact',[]);
})->name('home.contact')->middleware('auth');


Route::resource('posts', PostsController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update','destroy']);

Route::get('/posts/tag/{tag}',[PostTagController::class,'index'])->name('posts.tags.index');

Route::resource('posts.comments', PostCommentController::class)->only(['index','store']);

Route::resource('users.comments', UserCommentController::class)->only(['store']);

Route::resource('users',UserController::class)->only(['show','edit','update']);

Route::get('mailable', function () {
    $comment = Comment::find(1);
    return new App\Mail\CommentPostedMarkdown($comment);
});

