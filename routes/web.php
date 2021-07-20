<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;




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

Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'App\Http\Controllers\PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loai-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getProductType'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chi-tiet-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getProductDetail'
]);
Route::get('lien-he',[
    'as'=>'lien-he',
    'uses'=>'App\Http\Controllers\PageController@getContacts'
]);

Route::get('gioi-thieu',[
    'as'=>'gioi-thieu',
    'uses'=>'App\Http\Controllers\PageController@getAbout'
]);

Route::get('add-to-cart/{id}',[
   'as'=>'themgiohang',
    'uses'=>'App\Http\Controllers\PageController@getAddtoCart'
]);

Route::get('delete-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'App\Http\Controllers\PageController@getDeleteItemCart'
]);

Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'App\Http\Controllers\PageController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'App\Http\Controllers\PageController@postCheckout'
]);

Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'App\Http\Controllers\PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'App\Http\Controllers\PageController@postLogin'
]);

Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'App\Http\Controllers\PageController@getSignUp'
]);

Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'App\Http\Controllers\PageController@postSignUp'
]);

Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'App\Http\Controllers\PageController@getLogout'
]);

Route::get('timkiem',[
	'as'=>'timkiem',
	'uses'=>'App\Http\Controllers\PageController@getSearch'
]);

//----------------------------------------------------------------------------------------------------------------------------------//

Route::get('admin', [
    'as'=>'admin',
	'uses'=>'App\Http\Controllers\PageController@getSlide'
]);

Route::get('chinh-sua-banner/{id}',[
    'as'=>'chinh-sua-banner',
    'uses'=>'App\Http\Controllers\PageController@getEditItemSlide'
]);

Route::post('chinh-sua-banner/{id}',[
    'as'=>'chinh-sua-banner',
    'uses'=>'App\Http\Controllers\PageController@postEditItemSlide'
]);

Route::get('danh-sach-danh-muc', [
    'as'=>'danh-sach-danh-muc',
	'uses'=>'App\Http\Controllers\PageController@getListTypeProduct'
]);

Route::get('chinh-sua-danh-muc/{id}',[
    'as'=>'chinh-sua-danh-muc',
    'uses'=>'App\Http\Controllers\PageController@getEditTypeProduct'
]);

Route::post('chinh-sua-danh-muc/{id}',[
    'as'=>'chinh-sua-danh-muc',
    'uses'=>'App\Http\Controllers\PageController@postEditTypeProduct'
]);

Route::get('them-danh-muc',[
	'as'=>'them-danh-muc',
	'uses'=>'App\Http\Controllers\PageController@getAddTypeProduct'
]);

Route::post('them-danh-muc',[
	'as'=>'them-danh-muc',
	'uses'=>'App\Http\Controllers\PageController@postAddTypeProduct'
]);

Route::get('xoa-danh-muc/{id}',[
    'as'=>'xoa-danh-muc',
    'uses'=>'App\Http\Controllers\PageController@getDeleteTypeProduct'
]);

Route::get('danh-sach-san-pham',[
    'as'=>'danh-sach-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getListProduct'
]);

Route::get('them-san-pham',[
	'as'=>'them-san-pham',
	'uses'=>'App\Http\Controllers\PageController@getAddProduct'
]);

Route::post('them-san-pham',[
	'as'=>'them-san-pham',
	'uses'=>'App\Http\Controllers\PageController@postAddProduct'
]);

Route::get('chinh-sua-san-pham/{id}',[
    'as'=>'chinh-sua-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getEditProduct'
]);

Route::post('chinh-sua-san-pham/{id}',[
    'as'=>'chinh-sua-san-pham',
    'uses'=>'App\Http\Controllers\PageController@postEditProduct'
]);

Route::get('xoa-san-pham/{id}',[
    'as'=>'xoa-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getDeleteProduct'
]);

Route::get('danh-sach-khach-hang',[
    'as'=>'danh-sach-khach-hang',
    'uses'=>'App\Http\Controllers\PageController@getListUser'
]);

Route::get('xoa-khach-hang/{id}',[
    'as'=>'xoa-khach-hang',
    'uses'=>'App\Http\Controllers\PageController@getDeleteUser'
]);

Route::get('danh-sach-hoa-don',[
    'as'=>'danh-sach-hoa-don',
    'uses'=>'App\Http\Controllers\PageController@getListBill'
]);

Route::get('chinh-sua-hoa-don/{id}',[
    'as'=>'chinh-sua-hoa-don',
    'uses'=>'App\Http\Controllers\PageController@getEditBill'
]);

Route::post('chinh-sua-hoa-don/{id}',[
    'as'=>'chinh-sua-hoa-don',
    'uses'=>'App\Http\Controllers\PageController@postEditBill'
]);

Route::get('xoa-hoa-don/{id}',[
    'as'=>'xoa-hoa-don',
    'uses'=>'App\Http\Controllers\PageController@getDeleteBill'
]);

Route::get('chi-tiet-hoa-don/{id}',[
    'as'=>'chi-tiet-hoa-don',
    'uses'=>'App\Http\Controllers\PageController@getViewBillDetail'
]);
