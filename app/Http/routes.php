<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


    Route::get('/welcome', function () {
        return view('welcome');
    });


    Route::post('/signup', [
        'uses' => 'UserController@PostSignUp',
        'as' => 'signup'

    ]);

    Route::post('/signin', [
        'uses' => 'UserController@PostSignIn',
        'as' => 'signin'

    ]);

    Route::get('/dashboard', [
        'uses' => 'PostController@Dashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::post('/createpost', [
        'uses' => 'PostController@createpost',
        'as' => 'createpost',
        'middleware' => 'auth'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@logout',
        'as' => 'logout',

    ]);
    Route::get('/delete-post/{post_id}', [
        'uses' => 'PostController@GetDeletePost',
        'as' => 'delete-post',
        'middleware' => 'auth'
    ]);
   /*   Route::post('/edit',function (\Illuminate\Http\Request $request){

          return response()->json(['message'=>$request['postid']]);
      })->name('edit');*/


     Route::post('/edit', [
         'uses' => 'PostController@updatePost',
         'as' => 'edit'
     ]);



    Route::get('/account', [
        'uses' => 'UserController@getaccount',
        'as' => 'account',
        'middleware' => 'auth'
    ]);

    Route::post('/updateaccount', [
        'uses' => 'UserController@updateaccount',
        'as' => 'account.save',
    ]);

    Route::get('userimage/{filename}',[

        'uses' => 'UserController@GetUserImage',
        'as' => 'account.image',
    ]);



});




























