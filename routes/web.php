<?php
use App\Post;
use App\Category;

// use Auth;
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

///.......Test Rout..........

Route::get('/test', function() {
    dd(App\Category::find(1)->posts());
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    //....................Posts...

    //..Post Index..
    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as'   => 'posts'
    ]);

    //..Create Post..
    Route::get('/post/create', [
        'uses'  => 'PostsController@create',
        'as'    => 'post.create'
    ]);
    
    //..Store Post..
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as'   => 'post.store'
    ]);

    //..Edit Post..
    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as'   => 'post.edit'
    ]);

    //..Update Post..
    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as'   => 'post.update'
    ]);

    //..Move Post to Trash..
    Route::get('/post/trash/{id}', [
        'uses' => 'PostsController@trash',
        'as'   => 'post.trash'
    ]);

    //..View Trashed Posts..
    Route::get('/post/viewtrash', [
        'uses' => 'PostsController@viewtrash',
        'as'   => 'post.viewtrash'
    ]);

    //..Restore Trashed Posts..
    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as'   => 'post.restore'
    ]);
    
    // Delete Post Pemenently
    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as'   => 'post.delete'
    ]);


///////////////////////////////////////
    //...................Tags....////

    //Tag Index.
    Route::get('/tags', [
        'uses'  => 'TagsController@index',
        'as'    => 'tags'
    ]);

    //Tag Create
    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as'   => 'tag.create'
    ]);

    //Tag Store
    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as'   => 'tag.store'
    ]);

    //Tag Edit
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as'   => 'tag.edit'
    ]);

    //Tag update
    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as'   => 'tag.update'
    ]);

    //Tag Delete
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as'   => 'tag.delete'
    ]);

     ///////////////////////////////////////
    //...................Categories....////

    Route::get('/category/index', [
        'uses' => 'CategoriesController@index',
        'as'   => 'category.index'
    ]);

    Route::get('/category/create', [
        'uses'  => 'CategoriesController@create',
        'as'    => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as'   => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as'   => 'category.edit'
    ]);
    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as'   => 'category.update'
    ]);
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as'   => 'category.delete'
    ]);
});
