<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\SevicesController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PageHomeController::class, 'anasayfa'])->name('anasayfa');
Route::get('/about', [PageHomeController::class, 'about'])->name('about');
Route::get('/contact', [PageHomeController::class, 'contact'])->name('contact');
Route::get('/rooms', [PageHomeController::class, 'rooms'])->name('rooms');
Route::get('/services', [PageHomeController::class, 'services'])->name('services');
Route::get('/team', [PageHomeController::class, 'team'])->name('team');

Route::get('/rooms/{id}/roomdetay', [PageHomeController::class, 'roomdetay'])->name('roomdetay');
Route::get('/login',[CustomerController::class,'login'])->name('login');
Route::get('/logout',[CustomerController::class,'logout'])->name('logout');
Route::post('/customer/login',[CustomerController::class,'customer_login'])->name('customer_login');
Route::get('/register',[CustomerController::class,'register'])->name('register');


Route::get('/panel', [DashboardController::class, 'index'])->name('panel.index');

Route::get('/panel/sitesetting', [SiteSettingController::class, 'index'])->name('panel.sitesetting.index');
Route::post('/panel/sitesetting/update', [SiteSettingController::class, 'update'])->name('panel.sitesetting.update');


Route::get('/panel/roomtype', [RoomtypeController::class, 'index'])->name('panel.roomtype.index');
Route::get('/panel/roomtype/create', [RoomtypeController::class, 'create'])->name('panel.roomtype.create');
Route::get('/panel/roomtype/{id}/edit', [RoomtypeController::class, 'edit'])->name('panel.roomtype.edit');
Route::put('/panel/roomtype/{id}/update', [RoomtypeController::class, 'update'])->name('panel.roomtype.update');
Route::get('/panel/roomtype/{id}/destroy', [RoomtypeController::class, 'destroy'])->name('panel.roomtype.destroy');
Route::post('panel/roomtype/store', [RoomtypeController::class, 'store'])->name('panel.roomtype.store');


Route::get('/panel/room', [RoomController::class, 'index'])->name('panel.room.index');
Route::get('/panel/room/create', [RoomController::class, 'create'])->name('panel.room.create');
Route::get('/panel/room/{id}/edit', [RoomController::class, 'edit'])->name('panel.room.edit');
Route::put('/panel/room/{id}/update', [RoomController::class, 'update'])->name('panel.room.update');
Route::get('/panel/room/{id}/destroy', [RoomController::class, 'destroy'])->name('panel.room.destroy');
Route::post('panel/room/store', [RoomController::class, 'store'])->name('panel.room.store');


Route::get('/panel/customer', [CustomerController::class, 'index'])->name('panel.customer.index');
Route::get('/panel/customer/create', [CustomerController::class, 'create'])->name('panel.customer.create');
Route::get('/panel/customer/{id}/edit', [CustomerController::class, 'edit'])->name('panel.customer.edit');
Route::put('/panel/customer/{id}/update', [CustomerController::class, 'update'])->name('panel.customer.update');
Route::get('/panel/customer/{id}/destroy', [CustomerController::class, 'destroy'])->name('panel.customer.destroy');
Route::post('/panel/customer/store', [CustomerController::class, 'store'])->name('panel.customer.store');

Route::get('/panel/department', [StaffDepartment::class, 'index'])->name('panel.department.index');
Route::get('/panel/department/create', [StaffDepartment::class, 'create'])->name('panel.department.create');
Route::get('/panel/department/{id}/edit', [StaffDepartment::class, 'edit'])->name('panel.department.edit');
Route::put('/panel/department/{id}/update', [StaffDepartment::class, 'update'])->name('panel.department.update');
Route::get('/panel/department/{id}/destroy', [StaffDepartment::class, 'destroy'])->name('panel.department.destroy');
Route::post('panel/department/store', [StaffDepartment::class, 'store'])->name('panel.department.store');

Route::get('/panel/service', [SevicesController::class, 'index'])->name('panel.service.index');
Route::get('/panel/service/create', [SevicesController::class, 'create'])->name('panel.service.create');
Route::get('/panel/service/{id}/edit', [SevicesController::class, 'edit'])->name('panel.service.edit');
Route::put('/panel/service/{id}/update', [SevicesController::class, 'update'])->name('panel.service.update');
Route::get('/panel/service/{id}/destroy', [SevicesController::class, 'destroy'])->name('panel.service.destroy');
Route::post('panel/service/store', [SevicesController::class, 'store'])->name('panel.service.store');


Route::get('/panel/staff', [StaffController::class, 'index'])->name('panel.staff.index');
Route::get('/panel/staff/create', [StaffController::class, 'create'])->name('panel.staff.create');
Route::get('/panel/staff/{id}/edit', [StaffController::class, 'edit'])->name('panel.staff.edit');
Route::put('/panel/staff/{id}/update', [StaffController::class, 'update'])->name('panel.staff.update');
Route::get('/panel/staff/{id}/destroy', [StaffController::class, 'destroy'])->name('panel.staff.destroy');
Route::post('panel/staff/store', [StaffController::class, 'store'])->name('panel.staff.store');

Route::get('/panel/bookings', [BookingController::class, 'index'])->name('panel.bookings.index');
Route::get('/panel/bookings/create', [BookingController::class, 'create'])->name('panel.bookings.create');
Route::get('/panel/bookings/{id}/edit', [BookingController::class, 'edit'])->name('panel.bookings.edit');
Route::put('/panel/bookings/{id}/update', [BookingController::class, 'update'])->name('panel.bookings.update');
Route::get('/panel/bookings/{id}/destroy', [BookingController::class, 'destroy'])->name('panel.bookings.destroy');
Route::get('/panel/bookings/available-rooms/{checkin_date}', [BookingController::class, 'available_rooms'])->name('panel.bookings.available_rooms');
Route::post('panel/bookings/store', [BookingController::class, 'store'])->name('panel.bookings.store');

Route::get('/panel/login', [AdminController::class, 'login'])->name('panel.login');
Route::post('/panel/check_login', [AdminController::class, 'check_login'])->name('panel.check_login');

Route::get('/booking', [BookingController::class, 'front_booking'])->name('front_booking');
