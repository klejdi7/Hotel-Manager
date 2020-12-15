<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Auth::routes();


Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    }
    else{
    return view('auth/login');
}});


// Reservations
// Route::get('reservations', function () {
//     return view('reservations');
// })->name('reservations');

Route::get('status', function () {
    return view('status');
})->name('status');

Route::get('konfirmo', function () {
    return redirect('status')->with('status', 'Reservation Create Successfully!');
})->name('konfirmo');
// Route::resource('reservations' , 'ProfileController', array('as'=>'profile') );

// Rooms & Plans

Route::get('add_plan', function () {
    if (Auth::check()) {
    return view('add_plan');
    }
    else{
        abort(404);
    }
})->name('add_plan');


Route::get('add_room', function () {
    return view('add_room');
})->name('add_room');

// RESERVATIONS
Route::get('client', 'ReservationController@clientInfo')->name('client');
Route::get('delete','ReservationController@wrongRequest')->name('wrong');
Route::get('check','ReservationController@check')->name('check');
Route::get('reservations/getInfo','ReservationController@getName');
Route::post('reservations/getInfo','ReservationController@getName');
Route::get('new-res', 'ReservationController@create')->name('new-res');
Route::post('store','ReservationController@store');
Route::post('new-user','RegisterController@create');
Route::get('reservations', 'ReservationController@show')->name('reservations');
Route::post('reservations/info', 'ReservationController@getName')->name('reservations/info');
Route::get('deleteRes', 'ReservationController@resDelete');

// ------


// ROOMS
Route::get('rooms','ReservationController@rooms')->name('rooms');
Route::post('addRoom','ReservationController@storeRoom');
Route::get('deleteRoom', 'ReservationController@roomDelete');

// ---------

// PLANS
Route::get('plans','ReservationController@plans')->name('plans');
Route::post('addPlan','ReservationController@storePlan');
Route::get('deletePlan', 'ReservationController@planDelete');

// ----


// FINISHED RESERVATIONS
Route::get('finished', 'ReservationController@finished');
Route::post('getFInfo','ReservationController@getFinishedName');
Route::get('clientF', 'ReservationController@FinishedClientInfo')->name('clientf');
Route::get('/finish', 'ReservationController@getFinished')->name('finished');
// ------


// HOME
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// ------


// USER ROUTES
Route::get('deleteUser', 'ReservationController@userDelete');
Route::get('newuser', 'ReservationController@index');
Route::get('users', 'ReservationController@userView')->name('users');
Route::post('createUser', 'ReservationController@userCreate');

// --------

// Search
Route::any('/search',function(){
    $q = Input::get ( 'q' );

    $res = DB::table('reservations')
    ->where('fname_res','LIKE','%'.$q.'%')
    ->orWhere('reservation_id','LIKE','%'.$q.'%')
    ->get();


    if(count($res) > 0)
        return view('search')->withDetails($res)->withQuery ( $q );
    else return view ('search')->withMessage('No Details found. Try to search again !');
});
// ------
