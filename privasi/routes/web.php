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
Route::post('/simpanrequest','FrontControl@SimpanRequest');
Route::get('/contact','FrontControl@contact');
//Route::get('/calendar','FrontControl@calendar');
//Route::get('/login','FrontControl@login');
//Route::get('/signup','FrontControl@signup');
//Route::get('/logout','FrontControl@logout');
//Route::get('/forum/{category}','ThreadController@GeneralDiscussion');

Route::get('/forum','ThreadController@index');

Route::get('/forum/{category}', function($categoryid){
	$GenDisc = App\thread::where('category_id', '=', $categoryid)->Paginate(20);

	$namaKategori = App\category::where('id', '=', $categoryid)->get();

	$subKategoriii = App\category::where('parent_id', '=', $categoryid)->get();

	$subcate=new App\subcategory;
        
    try {

        $allSubCategories=$subcate->getCategories();
        
    } catch (Exception $e) {
        
        //no parent category found
    }

   // return view("forum/IsiKategori", compact("GenDisc"), compact("subKategoriii"), compact("namaKategori"));
	return view("forum/IsiKategori", compact("GenDisc", "subKategoriii", "namaKategori", "allSubCategories"));
	
});

Route::resource('thread', 'ThreadController');
Route::resource('comment', 'CommentController');
Route::get('/calendar', 'EventController@lihatCalendar');

Route::resource('events', 'EventController');
Route::get('/api', function () {
	$events = DB::table('events')->select('id', 'komunitas', 'title', 'start_time as start', 'end_time as end')->get();
	foreach($events as $event)
	{
		$event->title = $event->komunitas . ' - ' .$event->title;
		$event->url = url('events/' . $event->id);
	}
	return $events;
});

/*Route::Auth();
Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', 'AuthAdmin\LoginController@showLoginForm');
Route::post('/admin/login', 'AuthAdmin\LoginController@login');
Route::get('/admin/logout', 'AuthAdmin\LoginController@logout');

Route::get('/admin/register', 'AuthAdmin\RegisterController@showRegisterForm');
Route::post('/admin/register', 'AuthAdmin\RegisterController@register');*/

// Admin Area
/*Route::get('/admin', function(){
	if (Auth::guest())  
	{
		return view('/admin/login');
	}
	elseif (Auth::user()->HakAkses == 'User')
	{
		return redirect()->action('FrontControl@index');
	}
	else
	{
		return view('admin/dashboard');	
	}
});*/

Route::get('/admin', ['middleware' => ['auth', 'admin'], function() {
    // this page requires that you be logged in AND be an Admin
    return view( '/admin/dashboard' );
}]);

Route::get('/admin/kategori/DaftarKategori', 'CategoryController@index')->middleware('auth', 'admin');
Route::get('/admin/account/DaftarAccount', 'AccountController@index')->middleware('auth', 'admin');
Route::get('/admin/request/DaftarRequest', 'RequestController@index')->middleware('auth', 'admin');
Route::get('/admin/adminthread/DaftarThread', 'AdminThreadController@index')->middleware('auth', 'admin');
Route::get('/admin/request/create/{id}', 'RequestController@create')->middleware('auth', 'admin');

Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::resource('/admin/kategori', 'CategoryController');	
	Route::resource('/admin/account', 'AccountController');
	Route::resource('/admin/request', 'RequestController', ['except' => 'create']);
	Route::resource('/admin/adminthread', 'AdminThreadController');
});


/*Route::get('/admin/lihatDaftar/DaftarKategori', ['middleware' => ['auth', 'admin'], function() {
    // this page requires that you be logged in AND be an Admin
    $subcate=new App\subcategory;

    try {

        $allSubCategories=$subcate->getCategories();
        
    } catch (Exception $e) {
        
        //no parent category found
    }

   return view("/admin/lihatDaftar/DaftarKategori", compact('allSubCategories'));
}]);*/

Route::get('/admin/lihatDaftar/DaftarThread', ['middleware' => ['auth', 'admin'], function() {
    // this page requires that you be logged in AND be an Admin
    return view( '/admin/lihatDaftar/DaftarThread' );
}]);

Route::get('/admin/lihatDaftar/DaftarUser', ['middleware' => ['auth', 'admin'], function() {
    // this page requires that you be logged in AND be an Admin
    return view( '/admin/lihatDaftar/DaftarUser' );
}]);

Route::get('protected', ['middleware' => ['auth'], function() {
    // this page requires that you be logged inbut you don't need to be an admin
    return redirect()->action('FrontControl@index');
}]);


//Route::get('forum/content/{categoryid}/{post_id}', ['as' => 'konten', 'uses' => 'ThreadController@show']);

/*Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {
	Route::get('/','FrontControl@admin');

	Route::resource('categories', 'dataEntry\categoriesController');

	Route::resource('listRequest', 'transaksi\listRequestController');
});*/

/*Route::group(['Middleware' => 'web'], function(){
	Route::Auth();	
});

Route::group(['Middleware' => ['web','Auth']], function()
{	
	Route::get('/','FrontControl@index');
	Route::get('/', function(){
		if ((Auth::guest()) or (Auth::user()->HakAkses == 'User') )
		{
			$subcate=new App\subcategory;

	        try {

	            $allSubCategories=$subcate->getCategories();
	            
	        } catch (Exception $e) {
	            
	            //no parent category found
	        }

			return view('home', compact("allSubCategories"), array('title' => 'Kumpul Komunitas - Home', 'description' => '' , 'page' => 'home'));
	
		}
		elseif (Auth::user()->HakAkses == 'Admin') 
		{

			return view('admin/dashboard');	
		}
	});
});	

Route::get('admin', ['Middleware' => ['web', 'Auth', 'admin'], function(){
	return view('admin/dashboard');
}]);*/


//Route::post('/simpanthread','ThreadController@store');
//Route::get('/editthread/{categoryid}/{post_id}','ThreadController@edit');
//Route::resource('/simpaneditthread/{post_id}', 'ThreadController@update');


//Route::post('/simpancomment','CommentController@store');
//Route::get('/editcomment/{categoryid}/{post_id}/{comment_id}', 'CommentController@edit');
//Route::patch('/simpaneditcomment/{postid}/{commentid}', 'CommentController@update');


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
