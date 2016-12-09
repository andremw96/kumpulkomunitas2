<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/hello',function() {
	return 'Hello World';
});*/

//Route::get('/hello/{name}', 'Hello@show');

Route::get('/','FrontControl@index');
Route::get('/about','FrontControl@about');
Route::get('/regcommunity','FrontControl@DaftarKomunitas');
Route::get('/contact','FrontControl@contact');
Route::get('/calendar','FrontControl@calendar');
//Route::get('/login','FrontControl@login');
//Route::get('/signup','FrontControl@signup');
//Route::get('/logout','FrontControl@logout');
//Route::get('/forum/{category}','ThreadController@GeneralDiscussion');

Route::get('/forum/{category}', function($categoryid){
	$GenDisc = App\thread::where('category_id', '=', $categoryid)->get();


    return view("forum/$categoryid", compact('GenDisc'));
});

Route::get('/content', 'ThreadController@show');

Route::get('/admin','FrontControl@admin');

Route::post('/simpanthread','ThreadController@store');

/*Route::get('blade', function () 
{
	$drinks = array('Vodka','Gin','Brandy');
 	return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks)); 
});*/

Route::get('/insert', function(){
	App\category::create(array('category' => 'Hiburan'));
	return 'category added';
});

Route::get('/read', function(){
	$category = new App\category();

	$data = $category->all(array('cat_id', 'category'));

	foreach ($data as $list) {
		echo $list->cat_id . ' ' . $list->category .' ';
	}
});

Route::get('/update', function(){
	$category = App\category::find(2);
	$category->category = 'Kendaraan Roda 2';
	$category->save();

	$data = $category->all(array('cat_id', 'category'));

	foreach ($data as $list) {
		echo $list->cat_id . ' ' . $list->category . ' ';
	}
});

Route::get('/delete', function(){
	$category = App\category::find(2);
	$category->delete();

	$data = $category->all(array('cat_id', 'category'));

	foreach ($data as $list) {
		echo $list->cat_id . ' ' . $list->category . ' ';
	}
});
Auth::routes();

Route::get('/home', 'HomeController@index');
