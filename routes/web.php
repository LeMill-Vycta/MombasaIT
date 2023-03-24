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

/*Home Page + Appointments*/
Route::get('/','FrontendController@index')->name('homepage');
Route::get('/homecal', 'FrontendController@calEvents');

/*Appointments for Guest to view */
Route::get('/new-appointment/{staffId}/{date}','FrontendController@show')->name('create.appointment');


/*Our Services*/
Route::resource('service-appointment', 'ServicePageController', [
    'except' => ['index']
]);
    Route::get('/services', 'ServicePageController@index')->name('servicepage');


    /*Our Staff*/
Route::resource('/ourstaff-appointment', 'OurStaffPageController', [
    'except' => ['index']
]);
    Route::get('/our-staff', 'OurStaffPageController@index')->name('ourstaff');


    /*About Us Page*/
Route::get('/aboutus','AboutContactController@about')->name('aboutus');


/*Contact Page*/
Route::get('/contactus','AboutContactController@contact')->name('contactus');
Route::post('/contactus','AboutContactController@contactStore')->name('contact.store');




/*Client middleware*/
Route::group(['middleware'=>['auth','client']],function(){ 
    Route::post('/book/myappointment','FrontendController@store')->name('booking.appointment');
    Route::get('/book/myappointment/success','FrontendController@success')->name('success');
    Route::get('/my-appointments','FrontendController@myAppointments')->name('my.appointment');
    Route::get('/client-profile','ProfileController@index')->name('client.profile');
    Route::post('/profile','ProfileController@store')->name('profile.store');
    Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');
    Route::resource('clientprogress','ClientProgressController');
    Route::resource('invoices','InvoicesController');
    Route::get('/myappointment/progress/{id}','FrontendController@bookprogress')->name('bookprogress.view');
    Route::get('/myappointment/{id}','FrontendController@showCancel')->name('booking.showcancel');
    Route::post('/myappointment-cancel/{id}','FrontendController@cancel')->name('booking.cancel');

});




/*Dashboard*/
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dashcal', 'DashboardController@calEvents');




/*Admin middleware */
Route::group(['middleware'=>['auth','admin']],function(){ 
    Route::resource('staff', 'StaffController');
    Route::resource('clients', 'ClientsController');
    Route::resource('admin-invoices','AdminInvoicesController');
    Route::resource('/service', 'ServicesController', [
        'except' => ['update']
    ]);
    Route::get('/admin-invoices/paid/{id}','AdminInvoicesController@updatePaid')->name('update.paid');
    Route::post('/service/{service}/edit','ServicesController@update')->name('service.update');
    Route::get('/client/bookings','BookingListAdminController@index')->name('client.list');
    Route::get('/client/bookings/all','BookingListAdminController@allTimeAppointment')->name('client.listall');
    Route::get('/client/bookings/cancelled','BookingListAdminController@cancelledApp')->name('client.cancelled');
    Route::get('/client/bookings/status/{id}','BookingListAdminController@updateStatus')->name('update.status');
    Route::get('/client/bookings/cancel/{id}','AdminProgressController@updateCancel')->name('change.cancel');
    Route::resource('adminprogress','AdminProgressController',[
        'except' => ['update']
    ]);
    Route::post('/admin/progress/{id}','AdminProgressController@update')->name('adminprogress.update');
    Route::get('/admin-profile','AdminProfileController@index')->name('admin.profile');
    Route::post('/admin-profile/edit','AdminProfileController@store')->name('adminprofile.store');
    Route::post('/admin-profile/profile-pic','AdminProfileController@profilePic')->name('adminprofile.pic');
});

    
         

/*Staff middleware */
Route::group(['middleware'=>['auth','staff']],function(){ 
    Route::resource('appointment','AppointmentController');
    Route::resource('staff-invoices','StaffInvoicesController');
    Route::get('/staff-invoices/paid/{id}','StaffInvoicesController@updatePaid')->name('change.paid');
    Route::post('/appointment/check/','AppointmentController@check')->name('appointment.check');
    Route::post('/appointment-update/','AppointmentController@updateTime')->name('appointment.updateTime');
    Route::get('/staff-profile','StaffProfileController@index')->name('staff.profile');
    Route::post('/staff-profile/edit','StaffProfileController@store')->name('staffprofile.store');
    Route::post('/staff-profile/profile-pic','StaffProfileController@profilePic')->name('staffprofile.pic');
    Route::get('/bookings/today','BookingListStaffController@today')->name('booking.list');
    Route::get('/bookings/all','BookingListStaffController@allDays')->name('booking.listall');
    Route::get('/bookings/cancelled','BookingListStaffController@cancelledApp')->name('booking.cancelled');
    Route::get('/bookings/status/{id}','BookingListStaffController@changeStatus')->name('change.status');
    Route::get('/bookings/cancel/{id}','ProgressController@updateCancel')->name('update.cancel');
    Route::resource('progress','ProgressController',[
        'except' => ['update']
    ]);
    Route::post('/progress/{id}','ProgressController@update')->name('progress.update');



});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

