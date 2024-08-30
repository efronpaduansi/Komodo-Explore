<?php

use Illuminate\Support\Facades\Route;


/**
 * ===============WEBSITE ROUTES===============
*/

Route::name('web.')->group(function() {
    Route::get('/', [\App\Http\Controllers\Website\HomeController::class, 'index'])->name('homepage');

    Route::get('/packages', [\App\Http\Controllers\Website\PackageListController::class, 'index'])->name('package');
    Route::get('/packages/{slug}', [\App\Http\Controllers\Website\PackageListController::class, 'show'])->name('package_show');

    Route::get('/destinations', [\App\Http\Controllers\Website\DestinationController::class, 'index'])->name('destionation');
    Route::get('/about', [\App\Http\Controllers\Website\AboutController::class, 'index'])->name('about');
//    Route::get('/contact', [\App\Http\Controllers\Website\ContactController::class, 'index'])->name('contact');

    Route::middleware(['guest'])->group(function() {
        Route::get('/login', [\App\Http\Controllers\Website\AuthController::class, 'index'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Website\AuthController::class, 'authenticate'])->name('authenticate');
        Route::get('/register', [\App\Http\Controllers\Website\AuthController::class, 'register'])->name('register');
        Route::post('/register', [\App\Http\Controllers\Website\AuthController::class, 'store'])->name('auth_store');
    });


});



Route::name('user.')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-profile', [\App\Http\Controllers\User\MyProfileController::class, 'index'])->name('my_profile');
    Route::put('/my-profile/{user}', [\App\Http\Controllers\User\MyProfileController::class, 'update'])->name('my_profile_update');

    // user logout
    Route::post('/dashboard', [\App\Http\Controllers\Website\AuthController::class, 'logout'])->name('logout');

    Route::get('/packages/booking/{slug}', [\App\Http\Controllers\Website\PackageBookingController::class, 'index'])->name('package_booking');
    Route::post('/packages/booking', [\App\Http\Controllers\Website\PackageBookingController::class, 'bookingStore'])->name('package_booking_store');
    Route::get('/packages/booking/payment/{number}', [\App\Http\Controllers\Website\PackageBookingController::class, 'bookingPayment'])->name('package_booking_payment');
    Route::get('/packages/booking/download/{number}', [\App\Http\Controllers\Website\PackageBookingController::class, 'ticketDownload'])->name('package_booking_ticket_download');
});


/*
 * ============ADMIN ROUTES============
*/
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function (){
    Route::get('/', \App\Http\Controllers\Admin\Home\DashboardController::class)->name('home');

    Route::controller(\App\Http\Controllers\Admin\Location\LocationController::class)->group(function (){
        Route::get('locations', 'index')->name('locations_index');
        Route::get('locations/add', 'create')->name('locations_create');
        Route::post('locations', 'store')->name('locations_store');
        Route::get('locations/{id}', 'show')->name('locations_show');
        Route::get('locations/{id}/edit', 'edit')->name('locations_edit');
        Route::put('locations/{id}', 'update')->name('locations_update');
        Route::delete('locations/{id}', 'destroy')->name('locations_destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\Package\PackageController::class)->group(function (){
        Route::get('packages', 'index')->name('packages_index');
        Route::get('packages/add', 'create')->name('packages_create');
        Route::post('packages', 'store')->name('packages_store');
        Route::get('packages/{id}', 'show')->name('packages_show');
        Route::put('packages/{id}/change-image', 'changeImage')->name('packages_changeImage');
        Route::get('packages/{id}/edit', 'edit')->name('packages_edit');
        Route::put('packages/{id}', 'update')->name('packages_update');
        Route::delete('packages/{id}', 'destroy')->name('packages_destroy');
    });


    Route::controller(\App\Http\Controllers\Admin\Guest\GuestController::class)->group(function (){
        Route::get('guests', 'index')->name('guests_index');
        Route::get('guests/add', 'create')->name('guests_create');
        Route::post('guests', 'store')->name('guests_store');
        Route::get('guests/{id}', 'show')->name('guests_show');
        Route::put('guests/{id}/change-image', 'changeImage')->name('guests_changeImage');
        Route::get('guests/{id}/edit', 'edit')->name('guests_edit');
        Route::put('guests/{id}', 'update')->name('guests_update');
        Route::delete('guests/{id}', 'destroy')->name('guests_destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\Booking\BookingController::class)
        ->group(function (){
        Route::get('bookings', 'index')->name('bookings_index');
        Route::get('/booking/{id}/confirmed', 'confirmed')->name('bookings_confirmed');
        Route::get('/booking/{id}/cancelled', 'cancelled')->name('bookings_cancelled');
        Route::delete('bookings/{id}', 'destroy')->name('bookings_destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\Payment\PaymentChannelController::class)
        ->group(function (){
           Route::get('/sales/payment-channels', 'index')->name('payment_channels_index');
           Route::get('/sales/payment-channels/add', 'create')->name('payment_channels_create');
           Route::post('/sales/payment-channels/add', 'store')->name('payment_channels_store');
           Route::get('/sales/payment-channels/{id}/edit', 'edit')->name('payment_channels_edit');
           Route::put('/sales/payment-channels/{id}/update', 'update')->name('payment_channels_update');
           Route::get('/sales/payment-channels/{id}/active', 'doActive')->name('payment_channels_doActive');
           Route::delete('/sales/payment-channels/{id}', 'destroy')->name('payment_channels_destroy');

    });

    Route::controller(\App\Http\Controllers\Admin\Invoice\InvoiceController::class)->group(function (){
        Route::get('/sales/invoices', 'index')->name('invoices_index');
        Route::get('/sales/invoices/{number}', 'show')->name('invoices_show');
        Route::put('/sales/invoices/{number}', 'update')->name('invoices_update');
    });

    //List payments data
    Route::controller(\App\Http\Controllers\Admin\Payment\PaymentController::class)->group(function (){
       Route::get('/sales/payments', 'index')->name('payments_index');
       Route::delete('/sales/payments/{id}', 'destroy')->name('payments_destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\User\UserController::class)->group(function (){
       Route::get('/users', 'index')->name('users_index');
       Route::get('/users/add', 'create')->name('users_create');
       Route::post('/users/add', 'store')->name('users_store');
       Route::delete('/users/{id}', 'destroy')->name('users_destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\Setting\SettingController::class)->group(function (){
       Route::get('/settings/web-setting', 'index')->name('settings_index');
       Route::put('/settings/web-setting', 'update')->name('settings_update');
    });

    Route::controller(\App\Http\Controllers\Admin\Setting\ProfileSettingController::class)->group(function (){
       Route::get('/settings/profile', 'index')->name('settings_profile');
       Route::put('/settings/profile/{user}', 'update')->name('settings_profile_update');
       Route::put('/settings/profile/{user}/update-image', 'updateImage')->name('settings_profile_update_image');
    });

    Route::controller(\App\Http\Controllers\Admin\Hotel\HotelController::class)->group(function(){
        Route::get('/hotels', 'index')->name('hotels_index');
        Route::get('/hotels/add', 'create')->name('hotels_create');
        Route::post('/hotels/add', 'store')->name('hotels_store');
        Route::get('/hotels/{id}', 'edit')->name('hotels_edit');
        Route::put('/hotels/{id}', 'update')->name('hotels_update');
        Route::delete('/hotels/{id}', 'destroy')->name('hotels_destroy');
    });

});


