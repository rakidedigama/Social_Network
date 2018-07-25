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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Country,City
|--------------------------------------------------------------------------
|
*/
// Route::get('/addcountries','CountryController@addCountries');
// Route::get('/addcities','CityController@addCities');
Route::get('/countries','CountryController@Countries');
Route::get('/cities/{id}','CityController@CCities');

/*
|--------------------------------------------------------------------------
| Category,subCategory
|--------------------------------------------------------------------------
|
*/
// Route::get('/addcategories','CategoryController@addCategories');
// Route::get('/addsubcategories','subCategoryController@addSubCategories');
Route::get('/categories','CategoryController@Categories');
Route::get('/subcategories/{id}','subCategoryController@subCategories');


/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
|
*/
Route::get('/products','ProductController@getProducts');
Route::get('/userproducts/{id}','ProductController@getProductsUser');
Route::post('/addproduct','ProductController@addProduct')->middleware('auth');