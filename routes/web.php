<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\CVs;

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

// Dummy website content
Route::get("/lionel", function(){
    return "Dear me Laravel is hella buggy";
});

Route::get("list", "App\Http\Controllers\CVController@listAllCVs")->name("list_all_CVs");

Route::get("show/{id}", "App\Http\Controllers\CVController@listIndividualCV");

// Route::get("/home",  "App\Http\Controllers\CVController@indexPage");

Route::get("/search", "App\Http\Controllers\CVController@search");

Route::get("/user/cvs", [CVController::class, "return_user_created_cvs"]);



// Creating a new route for our CV creation CRUD requests
// Route::get("/cvs", "App\Http\Controllers\CVController@search");


// Route::get("/cvs", [CVController::class, "index"]); // Remember to add this
// Route::get('/home', [HomeController::class, 'index']);
Route::get("/cvs/{cv}/edit", [CVController::class, "edit"]);

// Route::get("cvs/check/42", [CVController::class, "check"])->name("check");
Route::get("check/{cv}/delete", function (){
    return "lionel now its working";
});


// Adding endpoint so that PUT request can be handled
Route::put("/cvs/{cv}", [CVController::class, "update"]);


// Creating a new CV
Route::get("/cvs/create", [CVController::class, "create"]);
// because the method is different to route will be treated different to the "get" route
Route::post("/cvs", [CVController::class, "store"]);


// Deleting a CV
Route::delete("/cvs/{cv}", function(CVs $cv){
    //return "never give up";
    $cv->delete();
    return redirect("/");
});

Auth::routes();
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
