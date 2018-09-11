<?php

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
})->name('index');

Route::get('/view-gallery', function (Request $req) {
    $search['name'] = '';
    $search['category_id'] = '';
    $search['sub_category_id'] = '';
    $data = Product::select('products.id','products.name','products.sub_category_id','products.image','products.user_id','sub_categories.name as category_name','users.city_id','users.name as owner_name','cities.name as city')
        ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->join('cities','users.city_id','cities.id')
        ->where('products.status','1');
        //->where('products.viewstatus','1')
        
        if($req->name) {
            $data = $data->where('products.name', 'LIKE', '%'.$req->name.'%')->orWhere('cities.name', 'LIKE', '%'.$req->name.'%')->orWhere('products.author', 'LIKE', '%'.$req->name.'%');
            array_push($search, array('name'=>$req->name));
        }

        if ( $req->category_id ) 
            $data = $data->where('sub_categories.category_id', $req->category_id );

        else if ( $req->sub_category_id ) 
            $data = $data->where('sub_categories.id', $req->sub_category_id );

        
        $data=$data->orderBy('id','DESC')->paginate(16);

        // For Search Query
        if ( $req->category_id ) 
            $data->appends(['category_id' => $req->category_id]);

        else if ( $req->sub_category_id ) 
            $data->appends(['sub_category_id' => $req->sub_category_id]);

        if ( $req->name ) 
            $data->appends(['name' => $req->name]);
        

        if( !$data->first() ) {
            if ( $req->name || $req->category_id || $req->sub_category_id ) {
                $data['msg'] = 'Sorry No Data Found.';
                if ( $req->page )
                	return abort(404);
            }
            else
            	return abort(404);
        }

    $categories = Category::all();
    return view('gallery')->with(['data'=>$data,'categories'=>$categories]);
})->name('gallery');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/owneditem', 'HomeController@owneditem')->name('owneditem');
Route::get('/lentitem', 'HomeController@lentitem')->name('lentitem');
Route::get('/borroweditem', 'HomeController@borroweditem')->name('borroweditem');
Route::get('/borrowreq', 'HomeController@borrowreq')->name('borrowreq');

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
Route::get('/userproducts/{id}/{skip}/{limit}','ProductController@getProductsUserSkipLimit');
Route::get('/userborrowrequest/{id}/{skip}/{limit}','ProductController@getBorrowRequestProducts');
Route::get('/userlentproducts/{id}/{skip}/{limit}','ProductController@getLentProducts');
Route::get('/userborrowedproducts/{id}/{skip}/{limit}','ProductController@getBorrowedProducts');
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