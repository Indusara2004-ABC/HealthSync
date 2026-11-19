<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController as H;
Route::get('/',[H::class,'welcome'])->name('welcome');
Route::match(['get','post'],'/login',[H::class,'login'])->name('login');
Route::match(['get','post'],'/register',[H::class,'register'])->name('register');
Route::post('/logout',[H::class,'logout'])->name('logout');
Route::middleware('auth')->group(function(){
 Route::get('/home',[H::class,'home'])->name('home');
 Route::match(['get','post'],'/profile',[H::class,'profile'])->name('profile');
 Route::get('/appointments',[H::class,'appointments'])->name('appointments');
 Route::match(['get','post'],'/appointments/new',[H::class,'book'])->name('book');
 Route::match(['get','post'],'/contact',[H::class,'contact'])->name('contact');
 Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
  Route::get('/dashboard',[H::class,'dashboard'])->name('dashboard');
  Route::match(['get','post'],'/appointments/{appointment}/edit',[H::class,'editAppointment'])->name('appointments.edit');
  Route::delete('/appointments/{appointment}',[H::class,'deleteAppointment'])->name('appointments.delete');
  Route::get('/doctors',[H::class,'doctors'])->name('doctors');
  Route::post('/doctors',[H::class,'addDoctor'])->name('doctors.add');
  Route::match(['get','post'],'/doctors/{doctor}/edit',[H::class,'editDoctor'])->name('doctors.edit');
  Route::delete('/doctors/{doctor}',[H::class,'deleteDoctor'])->name('doctors.delete');
  Route::get('/patients',[H::class,'patients'])->name('patients');
  Route::match(['get','post'],'/patients/{patient}/edit',[H::class,'editPatient'])->name('patients.edit');
  Route::get('/messages',[H::class,'messages'])->name('messages');
 });
});
