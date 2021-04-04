<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Basket;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::get('/product/{id}', function ($name) {
    $products = App\product::where('id', $name)->first();
    return view('product',["results"=>$products]);
});
Route::get('/category/{name}', function ($name) {
    $products = App\product::where('category', $name)->get();
    return view('category',["results"=>$products]);
});
Route::get('/home', function(){
    return view('welcome');
});
Route::post('/delete_product/{id}', function($id){
    Basket::find($id)->delete();
    return redirect('/basket');
});

Route::get('/basket', function(){
    return view('basket');
});
Route::post('/add_product', function(Request $request){

    Basket::create([
        'product_id'=>$request->product_id,
        'count'=>1,
        'user_id'=>Auth::user()->id
    ]);
    return 1;
});
Route::post('/buy',function(){
    $mybasket = Basket::all()->where('user_id',Auth::user()->id);
    for($i = 0; $i < count($mybasket); $i++){
        Basket::find($mybasket[$i]->id)->delete();
    }
    return redirect('/home');
});
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout',  'Auth\LoginController@logout')->name('logout');

Route::get('register',   'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register',   'Auth\RegisterController@register');

Route::get('password/reset',  'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email',  'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}',   'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset',   'Auth\ResetPasswordController@reset');
