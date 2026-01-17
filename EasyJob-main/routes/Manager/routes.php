<?php

use App\Http\Controllers\Manager\HomeController;
use Illuminate\Support\Facades\Route;

Route::post('Mlogout', 'Manager\AuthController@ManagerLogout')->name('manager.logout');
Route::post('Mlogin', 'Manager\AuthController@postLogin')->name('manager.Mlogin');
## Manager Routes
Route::group(['namespace' => 'Manager', 'prefix' => 'AD6017FC01B47EC229B6EEE3023BF828C97642485B91F3E8E37CE2955FC8B8D670DEA5F5D7AA05F09FFB3305F0841E79BF0A4AB2E5B93E65B1E96CFDA4ACF911'], function () {

    Route::GET('login', function () {
        return view('manager.login');
    })->name('ManagerLogin');



    Route::group(['middleware' => ['is.manager']], function () {
        ########## Start home page - users - contact
        Route::get('/', 'HomeController@index')->name('managerHome');
        Route::get('users', 'HomeController@users')->name('manager.users');
        Route::get('contacts', 'HomeController@contact')->name('manager.contact');
        ########## End home page - users


        ########## Start Discount Routes

        Route::GET('discounts', 'DiscountController@index')->name('manager.discounts.index');
        Route::POST('Cdiscount', 'DiscountController@store')->name('manager.discount.store');
        Route::POST('Sdiscount', 'DiscountController@update')->name('manager.discount.update');
        Route::POST('Ddiscount', 'DiscountController@destory')->name('manager.discount.destory');


        ########## End Discount Routes
        

        ########## Start Payments Routes

        Route::GET('payments', 'PaymentController@index')->name('manager.payments.index');

        ########## End Payments Routes
        

    });
});
