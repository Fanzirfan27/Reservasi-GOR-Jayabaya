<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FieldPriceController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\LaporanPendapatanController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;

Route::get('/', function () {
    return view('welcomeUtama');

//userrr
});Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard/users', function () {return view('user.DashboardUser');})->name('user.dashboard'); //dashboard user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');//profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('user/bookings')->name('user.bookings.')->group(function () {
    Route::get('/view', [UserBookingController::class, 'indexTampilan'])->name('view');
    Route::get('/status/{status}', [UserBookingController::class, 'status'])->name('status');
    Route::get('/detail/{booking}', [UserBookingController::class, 'show'])->name('show');
});
    Route::get('/booking/{id}/export-pdf', [UserBookingController::class, 'exportPdf'])->name('booking.export.pdf');

    Route::post('/payments/{booking}', [UserPaymentController::class, 'store'])->name('user.payments.store');

    //penyewaan
    Route::get('/penyewaan-lapangan', [FieldController::class, 'indexUser'])->name('penyewaan.lapangan');
    Route::get('/penyewaan/{field}', function (\App\Models\Field $field) {
        $fieldPrices = \App\Models\FieldPrice::where('field_id', $field->id)->get();
        return view('user.bookingForm', compact('field', 'fieldPrices'));
    });
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/penyewaan-lapangan/voli', [FieldController::class, 'showVoli'])->name('penyewaan.voli');
    Route::get('/penyewaan-lapangan/basket', [FieldController::class, 'showBasket'])->name('penyewaan.basket');
    Route::get('/penyewaan-lapangan/futsal', [FieldController::class, 'showFutsal'])->name('penyewaan.futsal');

});

//adminn
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.dashboard'); //dashboard admin

    //booking management
    Route::get('/bookings', [BookingController::class, 'indexAdmin'])->name('admin.bookings.index');
    Route::put('/admin/bookings/{id}', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    Route::delete('/admin/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    
    //field
    Route::get('/fields', [FieldController::class, 'index'])->name('fields.index');
    Route::get('/fields/create', [FieldController::class, 'create'])->name('fields.create');
    Route::post('/fields', [FieldController::class, 'store'])->name('fields.store');
    Route::get('/fields/{field}/edit', [FieldController::class, 'edit'])->name('fields.edit');
    Route::put('/fields/{field}', [FieldController::class, 'update'])->name('fields.update');
    Route::delete('/fields/{field}', [FieldController::class, 'destroy'])->name('fields.destroy');

    // field price
    Route::get('/field-prices', [FieldPriceController::class, 'index'])->name('field-prices.index');
    Route::get('/field-prices/create', [FieldPriceController::class, 'create'])->name('field-prices.create');
    Route::post('/field-prices', [FieldPriceController::class, 'store'])->name('field-prices.store');
    Route::get('/field-prices/{id}/edit', [FieldPriceController::class, 'edit'])->name('field-prices.edit');
    Route::put('/field-prices/{id}', [FieldPriceController::class, 'update'])->name('field-prices.update');
    Route::delete('/field-prices/{id}', [FieldPriceController::class, 'destroy'])->name('field-prices.destroy');

    //payment
    Route::get('/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::put('/admin/payments/{payment}', [PaymentController::class, 'update'])->name('admin.payments.update');

    // user management
    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::put('/admin/users/{user}', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{user}', [UserManagementController::class, 'show'])->name('admin.users.show');

    // laporan pendapatan
    Route::get('/laporan', [LaporanPendapatanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/generate', [LaporanPendapatanController::class, 'generate'])->name('laporan.generate');
    Route::get('/laporan/export', [LaporanPendapatanController::class, 'export'])->name('laporan.export');
});


require __DIR__.'/auth.php';
// // //admin
// Route::get('/dashboard/admin', function (){
//     return view('admin.DashboardAdmin');
// });


// Route::middleware('auth')->group(function () {

// });
