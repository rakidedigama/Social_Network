<?php
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

/*
|--------------------------------------------------------------------------
| Front End Views
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'ViewController@index')->name('index');
Route::get('/view-gallery', 'ViewController@gallery')->name('gallery');
Route::get('/view-book/{id}', 'ViewController@viewBook')->name('viewBook');
Route::get('/profile/{id}', 'ViewController@profile')->name('profile');
/*
|--------------------------------------------------------------------------
| Authentications Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();
/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
|
*/
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/owned-items', 'HomeController@owneditem')->name('owneditem');
Route::get('/sent-requests', 'HomeController@sentReq')->name('sentReq');
Route::get('/received-requests', 'HomeController@borrowreq')->name('borrowreq');
Route::get('/rentals', 'HomeController@lentitem')->name('lentitem');
Route::get('/borrowals', 'HomeController@borroweditem')->name('borroweditem');

/*
|--------------------------------------------------------------------------
| Country,City
|--------------------------------------------------------------------------
|
*/
// Route::get('/addcountries','CountryController@addCountries');
// Route::get('/addcities','CityController@addCities');
Route::get('/countries','CountryController@Countries')->name('countries');
Route::get('/cities/{id}','CityController@CCities');

/*
|--------------------------------------------------------------------------
| Category,subCategory
|--------------------------------------------------------------------------
|
*/
Route::get('/categories','CategoryController@Categories')->name('categories');
Route::get('/subcategories/{id}','subCategoryController@subCategories');

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
|
*/
Route::post('/change-user-image','UserController@ChangeImage')->name('change-user-image');
/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
|
*/
Route::get('/products/{skip}/{limit}/{name}','ProductController@getProducts');
Route::get('/userproducts/{id}','ProductController@getProductsUser');
Route::get('/userproducts/{id}/{limit}','ProductController@getProductsUserLimit');
//Route::get('/userproducts/{id}/{skip}/{limit}','ProductController@getProductsUserSkipLimit');
//Route::get('/userborrowrequest/{id}/{skip}/{limit}','ProductController@getBorrowRequestProducts');
Route::get('/userlentproducts/{id}/{skip}/{limit}','ProductController@getLentProducts');
// Route::get('/userborrowedproducts/{id}/{skip}/{limit}','ProductController@getBorrowedProducts');
Route::post('/addproduct','ProductController@addProduct')->name('addproduct')->middleware('auth');
Route::post('/deleteproduct','ProductController@delProduct')->name('deleteproduct')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Product Request
|--------------------------------------------------------------------------
|
*/
Route::post('/reqborrow', 'ProductRequestController@borrowReq')->name('reqborrow');
Route::post('/updatereqborrow', 'ProductRequestController@updateBorrowReq')->name('updatereqborrow');