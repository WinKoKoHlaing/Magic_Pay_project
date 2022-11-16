<?php

use Illuminate\Support\Facades\Route;

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

//Admin_User Auth
Route::get('admin/login','Auth\AdminLoginController@showLoginForm');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

//User Auth
Auth::routes();
Route::middleware('auth')->namespace('Frontend')->group(function(){

   Route::get('/','PageController@home')->name('home');
   Route::get('/profile','PageController@profile')->name('profile');

   Route::get('/update-password','PageController@updatePassword')->name('update-password');
   Route::post('/update-password-store','PageController@updatePasswordStore')->name('update-password.store');

   Route::get('/wallet','PageController@wallet')->name('wallet');

   Route::get('/transfer','PageController@transfer')->name('transfer');
   Route::get('/transfer/confirm','PageController@transferConfirm')->name('transfer-confirm');
   Route::post('/transfer/complete','PageController@transferComplete')->name('transfer-complete');

   Route::get('/transaction','PageController@transaction')->name('transaction');
   Route::get('/transaction/{trx_id}','PageController@transactionDetail')->name('transaction-detail');
   

   Route::get('/to-account-verify','PageController@toAccountVerify');
   Route::get('/password-check','PageController@passwordCheck');
   Route::get('/transfer-hash','PageController@transferHash');

   Route::get('/receive-qr','PageController@receiveQR');

   Route::get('/scan-and-pay','PageController@scanAndPay');
   Route::get('/scan-and-pay-form','PageController@scanAndPayForm')->name('scan-and-pay-form');
   Route::get('/scan-and-pay/confirm','PageController@scanAndPayConfirm')->name('scan-and-pay-confirm');
   Route::post('/scan-and-pay/complete','PageController@scanAndPayComplete')->name('scan-and-pay-complete');

   Route::get('/notification','NotificationController@index')->name('notification');
   Route::get('/notification/{id}','NotificationController@detail')->name('notification-detail');
});
