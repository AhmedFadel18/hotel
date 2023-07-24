<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\CustomerBookingContoller;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\TestimonialController;

Route::prefix('admin')->group(function () {
    // Auth Routes
    Route::get('/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/login-check', [AdminAuthController::class, 'login_check'])->name('admin.login_check');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //Room types routes
    Route::get('/room-types', [RoomTypeController::class, 'index'])->name('admin.room_types.index');
    Route::get('/room-types/create', [RoomTypeController::class, 'create'])->name('admin.room_types.create');
    Route::post('/room-types/store', [RoomTypeController::class, 'store'])->name('admin.room_types.store');
    Route::get('/room-types/show/{id}', [RoomTypeController::class, 'show'])->name('admin.room_types.show');
    Route::get('/room-types/edit/{id}', [RoomTypeController::class, 'edit'])->name('admin.room_types.edit');
    Route::post('/room-types/update/{id}', [RoomTypeController::class, 'update'])->name('admin.room_types.update');
    Route::get('/room-types/delete/{id}', [RoomTypeController::class, 'delete'])->name('admin.room_types.delete');
    Route::get('/roomtype-image/delete/{id}', [RoomTypeController::class, 'delete_image'])->name('admin.roomtype_image.delete');

    //Rooms routes
    Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::post('/rooms/update/{id}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::get('/rooms/delete/{id}', [RoomController::class, 'delete'])->name('admin.rooms.delete');

    //Customers routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::get('/customers/delete/{id}', [CustomerController::class, 'delete'])->name('admin.customers.delete');

    //Department routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('admin.departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('admin.departments.create');
    Route::post('/departments/store', [DepartmentController::class, 'store'])->name('admin.departments.store');
    Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('admin.departments.edit');
    Route::post('/departments/update/{id}', [DepartmentController::class, 'update'])->name('admin.departments.update');
    Route::get('/departments/delete/{id}', [DepartmentController::class, 'delete'])->name('admin.departments.delete');

    //Staff routes
    Route::get('/staff', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('admin.staff.update');
    Route::get('/staff/show/{id}', [StaffController::class, 'show'])->name('admin.staff.show');
    Route::get('/staff/delete/{id}', [StaffController::class, 'delete'])->name('admin.staff.delete');
    Route::get('/staff/payments/{id}', [StaffController::class, 'allPayments'])->name('admin.staff.payments');
    Route::get('/staff/create-payment/{id}', [StaffController::class, 'createPayment'])->name('admin.staff.salary.create');
    Route::post('/staff/store-payment/{id}', [StaffController::class, 'storePayment'])->name('admin.staff.salary.store');

    //Booking routes
    Route::get('/booking', [BookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('admin.booking.store');
    Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::post('/booking/update/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::get('/booking/delete/{id}', [BookingController::class, 'delete'])->name('admin.booking.delete');
    Route::get('/booking/available-rooms/{data}', [BookingController::class, 'availableRooms'])->name('admin.booking.available_rooms');

    //Payment Routes
    Route::get('/booking/success', [BookingController::class, 'booking_payment_success'])->name('admin.booking.success');
    Route::get('/booking/fail', [BookingController::class, 'booking_payment_fail'])->name('admin.booking.fail');

    // Services Routes
    Route::get('/services', [ServicesController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServicesController::class, 'create'])->name('admin.services.create');
    Route::post('/services/store', [ServicesController::class, 'store'])->name('admin.services.store');
    Route::get('/services/edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
    Route::get('/services/show/{id}', [ServicesController::class, 'show'])->name('admin.services.show');
    Route::get('/services/delete/{id}', [ServicesController::class, 'delete'])->name('admin.services.delete');

    // Testimonials Route
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/delete-testimonial/{id}', [AdminController::class, 'deleteDtestimonial'])->name('admin.testimonials.delete');
});


// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('home.show');

// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('home.login');
Route::post('/login', [AuthController::class, 'login'])->name('home.check_login');
Route::get('/register', [AuthController::class, 'registeration'])->name('home.register');
Route::post('/register', [AuthController::class, 'storeCustomer'])->name('home.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('home.logout');

Route::get('forget-password',[AuthController::class,'forgetPassword'])->name('home.show_forget_password');
Route::post('forget-password',[AuthController::class,'submitForgetPassword'])->name('home.submit_forget_password');
Route::get('reset-password{token}',[AuthController::class,'resetPassword'])->name('home.show_reset_password');
Route::post('reset-password',[AuthController::class,'confirmResetPassword'])->name('home.submit_reset_password');


Route::get('/booking/create', [CustomerBookingContoller::class, 'index'])->name('home.booking');
Route::post('/booking/store', [CustomerBookingContoller::class, 'store'])->name('home.booking.store');
Route::get('/booking/success', [CustomerBookingContoller::class, 'booking_payment_success'])->name('home.booking.success');
Route::get('/booking/fail', [CustomerBookingContoller::class, 'booking_payment_fail'])->name('home.booking.fail');


Route::get('/booking/available-rooms/{data}', [CustomerBookingContoller::class, 'availableRooms'])->name('booking.available_rooms');

Route::get('/booking/{id}/payment', [PaymentsController::class, 'create'])->name('home.bookings.payments.create');

// Testimonials Route
Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('home.testimonials.store');

Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');

Route::post('/store',[ContactController::class,'store'])->name('home.mail.store');
