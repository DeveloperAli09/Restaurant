<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('');
// });

//                   Admin Controller Route
Route::get("/users",[AdminController::class, "user"]);

Route::get("/deletemenu/{id}",[AdminController::class, "deletemenu"]);

Route::get("/foodmenu",[AdminController::class, "foodMenu"]);

Route::post("/uploadfood",[AdminController::class, "upload"]);

Route::post("/reservation",[AdminController::class, "reservation"]);

Route::get("/viewreservation",[AdminController::class, "viewreservation"]);

Route::get("/viewchef",[AdminController::class, "viewchef"]);

Route::get("/updatechef/{id}",[AdminController::class, "updatechef"]);

Route::post("/uploadchef",[AdminController::class, "uploadchef"]);

Route::post("/updatefoodchef/{id}",[AdminController::class, "updatefoodchef"]);

Route::get("/deletchef/{id}",[AdminController::class, "deletchef"]);

Route::get("/home",[AdminController::class, "admin"]);

Route::get("/deleteuser/{id}",[AdminController::class, "deleteuser"]);

Route::get("/orders",[AdminController::class, "orders"]);
Route::get("/search",[AdminController::class, "search"]);


//                     Home Controller Route
Route::get("/",[HomeController::class, "index"]);

Route::get("/redirects",[HomeController::class, "redirects"]);

Route::post("/addcart/{id}",[HomeController::class, "addcart"]);
Route::get("/showcart/{id}",[HomeController::class, "showcart"]); 
Route::get("/remove/{id}",[HomeController::class, "remove"]); 
Route::post("/orderconfirm",[HomeController::class, "orderConfirm"]); 

Route::middleware([

    'auth:sanctum',

    config('jetstream.auth_session'),

    'verified'

])->group(function () {

    Route::get('/dashboard', function () {

        return view('dashboard');

    })->name('dashboard');
});
