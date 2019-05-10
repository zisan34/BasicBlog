<?php

//Put this code at the beginning your routes file its will work fine
//this is for count parameter problem
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

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
Route::get('/test',function(){
	return App\User::find(1)->profile;

});



Auth::routes();


Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {


	Route::get('/home', [
		'uses'=>'HomeController@index',
		'as'=>'home']);

    Route::get('/post/create',[
    	'uses'=>'PostsController@create',
    	'as'=>'post.create']);


    // Route::get('/category/create',[
    // 	'uses'=>'CategoriesController@create',
    // 	'as'=>'category.create']);

    Route::get('/categories',[
    	'uses'=>'CategoriesController@index',
    	'as'=>'categories']);

    Route::get('/category/edit/{id}',[
    	'uses'=>'CategoriesController@edit',
    	'as'=>'category.edit']);

    Route::get('/category/delete/{id}',[
    	'uses'=>'CategoriesController@destroy',
    	'as'=>'category.delete'])->middleware('admin');

    Route::get('/category/{id}',[
    	'uses'=>'CategoriesController@posts',
    	'as'=>'category.show']);

	Route::post('/category/store',[
    	'uses'=>'CategoriesController@store',
    	'as'=>'category.store']);

	Route::post('/category/update/{id}',[
    	'uses'=>'CategoriesController@update',
    	'as'=>'category.update']);


    Route::get('/posts',[
    	'uses'=>'PostsController@index',
    	'as'=>'posts']);

	Route::post('/post/store',[
    	'uses'=>'PostsController@store',
    	'as'=>'post.store']);

	Route::get('/post/delete/{id}',[
    	'uses'=>'PostsController@destroy',
    	'as'=>'post.delete']);

	Route::get('/post/edit/{id}',[
    	'uses'=>'PostsController@edit',
    	'as'=>'post.edit']);

	Route::post('/post/update/{id}',[
    	'uses'=>'PostsController@update',
    	'as'=>'post.update']);

    Route::get('/posts/trashed',[
    	'uses'=>'PostsController@trashed',
    	'as'=>'posts.trashed']);

    Route::get('/post/kill/{id}',[
    	'uses'=>'PostsController@kill',
    	'as'=>'post.kill']);

    Route::get('/post/restore/{id}',[
    	'uses'=>'PostsController@restore',
    	'as'=>'post.restore']);





    Route::get('/tags',[
    	'uses'=>'TagsController@index',
    	'as'=>'tags']);

	Route::post('/tag/store',[
    	'uses'=>'TagsController@store',
    	'as'=>'tag.store']);

	Route::get('/tag/edit/{id}',[
    	'uses'=>'TagsController@edit',
    	'as'=>'tag.edit']);

	Route::post('/tag/update/{id}',[
    	'uses'=>'TagsController@update',
    	'as'=>'tag.update']);

	Route::get('/tag/delete/{id}',[
    	'uses'=>'TagsController@destroy',
    	'as'=>'tag.delete']);

	Route::get('/users',[
		'uses'=>'UsersController@index',
		'as'=>'users']);

    Route::get('/user/create',[
    	'uses'=>'UsersController@create',
    	'as'=>'user.create']);

    Route::post('/user/store',[
    	'uses'=>'UsersController@store',
    	'as'=>'user.store']);
    Route::get('/user/toogle/{id}',[
    	'uses'=>'UsersController@tooglePermission',
    	'as'=>'user.tooglePermission'])->middleware('admin');

    Route::get('/user/profile',[
    	'uses'=>'ProfilesController@index',
    	'as'=>'user.profile']);
    Route::post('/user/update',[
    	'uses'=>'ProfilesController@update',
    	'as'=>'user.update']);
    Route::get('/user/delete/{id}',[
    	'uses'=>'UsersController@destroy',
    	'as'=>'user.delete']);

    Route::get('/settings',[
    	'uses'=>'SettingsController@index',
    	'as'=>'settings']);
    Route::post('/settings/update',[
    	'uses'=>'SettingsController@update',
    	'as'=>'settings.update']);

});

Route::get('/',[
'uses'=>'FrontEndController@index',
'as'=>'index']);

Route::get('/post/{id}',[
'uses'=>'FrontEndController@singlePost',
'as'=>'post.single']);

Route::get('/category/{id}',[
	'uses'=>'FrontEndController@category',
	'as'=>'category.posts']);

Route::get('/tag/{id}',[
	'uses'=>'FrontEndController@tag',
	'as'=>'tag.posts']);

Route::get('/results',function(){
	$posts=\App\Post::where('title','like','%'.request('query').'%')->get();


	return view('searchResult')
	->with('posts',$posts)
	->with('title',request('query'))
    ->with('settings',\App\Setting::first())
    ->with('categories',\App\Category::orderBy('updated_at','desc')->take(5)->get())
    ->with('tags',\App\Tag::all());
});
