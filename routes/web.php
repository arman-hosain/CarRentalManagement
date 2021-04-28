<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\MimeTypeGuesserInterface;

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


Route::group(['middleware' => 'auth'], function () {


Route::get( '/dashboard','PageController@showCar')->name('cars.show');


Route::get( '/bookedCars','PageController@showBookedCar')->name('cars.showBookedCar');

Route::get('/search', 'CarController@search')->name('search');



Route::get( '/carBooking/{id}','carBookingController@bookingform')->name('cars.book');



Route::post('/carBooking/{id}','CarBookingController@booking')->name('cars.carBooking');

// request page handler by user

Route::get( '/carRequest/{id}','RequestController@requestCar')->name('cars.request');



Route::post('/carRequest/{id}','RequestController@requestBook')->name('cars.requestBooking');

// ===================================================================

Route::get('/paymentStatusChange/{id}','carBookingController@paymentUpdate')->name('cars.paymentUpdate');

//=================edit the status of the car ================================================================

Route::get('/carstatusUpdate/{car}','CarController@statusUpdate' )->name('cars.statusUpdate');
// ===========================================================================================================
Route::get('/showRequests','PageController@showRequest')->name('showRequests');
// =================================================================================
Route::get('/showRequests/{RequestID}','RequestController@requestStatus')->name('changeRequestStatus');
//===============================================================================================
Route::post('/create','CarController@create')->name('cars.create');
Route::post('/cars/{car}','CarController@update')->name('cars.update');


Route::get('/addCarx','PageController@addCar' )->name('cars.addGorib');
Route::get('/cars/{car}','CarController@edit' )->name('cars.edit');
Route::delete('/cars/{car}','CarController@destroy' )->name('cars.deletex');

Route::get('/home', 'HomeController@index')->name('home');






});






Auth::routes();



