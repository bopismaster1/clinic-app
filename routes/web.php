<?php

use App\Http\Controllers\Logout;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Doctor\Index as DoctorIndex;
use App\Http\Livewire\Patient\Checkup;
use App\Http\Livewire\Patient\Index;
use App\Http\Livewire\Patient\Info;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login",Login::class)->middleware('guest')->name("login");
Route::get("/register",Register::class)->middleware("guest")->name("register");
Route::post("/logout",[Logout::class,"Logout"])->name("logout");

Route::get("/dashboard",Dashboard::class)->middleware('auth')->name("dashboard");

Route::middleware("auth")->prefix("patient")->group(function(){
Route::get("/browse",Index::class)->name("patient.browse");
Route::get("/info/{id?}",Info::class)->name("patient.info");
    Route::get("/new/checkup/{id}/{checkup_id?}", Checkup::class)->name("patient.checkup");
    // Route::get("/new/checkup/{id}/{}", Checkup::class)->name("patient.checkup");
});

Route::middleware("auth")->prefix("doctor")->group(function () {
    Route::get("/browse", DoctorIndex::class)->name("doctor.browse");
});
