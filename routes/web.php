<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
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

//DEMO PURPOSES

Route::get('/intro', function(){
    return 'Hello World';
});

Route::get('/class', function(Request $request){

    return $request;
});




// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/','/intro');

Route::view('/welcome', 'welcome', ['name' => 'John']);

Route::get('/user/{id}', function($id){
    return 'User '.$id;
});

//params + DI
Route::get('/user/{id}', function(Request $request, $id){
    return 'User '.$id;
});



Route::get('/class/{id}', function($id){
    return 'Class '.$id;
})->name('class');

Route::get('/username/{name?}', function($name = null){
    return 'Username'.$name;
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return 'Dashboard';
    });

    Route::get('/report', function(){
        return 'Dashboard';
    });
});

Route::get('/user/{user}', function(User $user){
    return $user->name;
});


// Route::fallback(function(){
//     return 'No available page';
// }); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/check-request', [App\Http\Controllers\PageController::class, 'checkRequest']);

Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'showContactPage']);
Route::post('/contacts', [App\Http\Controllers\PageController::class,  'storeContacts']);

// Route::get('/posts', [App\Http\Controllers\PostController::class,'index']);
// Route::get('/posts/{post}', [App\Http\Controllers\PostController::class,'post']);

Route::resource('/posts', App\Http\Controllers\PostController::class);

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
