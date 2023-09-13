<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/test', function() {
//     return view('welcome');
// }); // 클로저

// Route::get('/register', function() {
//     return view('register_form');
// });

// Route::post('/register', function (Request $req) {
//     $userData = $req->only("name","email","birthday","affliation");
//     // return $email;
//     return view('register',['name'=>$userData['name'], 'email'=>$userData['email'], 'birthday'=>$userData['birthday'], 'affliation'=>$userData['affliation']]);
// });

// Route::get('/update', function() {
//     return view('update_form');
// });

// Route::put('/update', function(Request $req){
//     $userData = $req->only("name","email","birthday","affliation");
//     return view('update',['name'=>$userData['name'], 'email'=>$userData['email'], 'birthday'=>$userData['birthday'], 'affliation'=>$userData['affliation']]);
// });

// Route::get('/remove', function(){
//     return view('remove_form');
// });

// Route::delete('/remove', function(Request $req){
//     $deleteData = $req->input("name");
//     return view('remove',['name'=> $deleteData]);
// });

Route::get('/user/{id?}', function (string $id='100') {
    return 'User '.$id;
});

Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId){
    return '게시글 '.$postId.'번 글의 댓글 '.$commentId.'번을 인출했습니다.';
});

Route::get('/test',[UserController::class, 'test']);

Route::get('/register',[UserController::class, 'create']);

Route::post('/register',[UserController::class, 'store']);

Route::get('/update',[UserController::class, 'edit']);

Route::put('/update',[UserController::class, 'update']);

Route::get('/players',[UserController::class, 'index']);

Route::delete('/remove',[UserController::class, 'destroy']);

Route::resource('/photos',PhotoController::class);
