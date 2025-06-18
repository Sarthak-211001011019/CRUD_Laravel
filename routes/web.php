<!-- // This file is part of the Laravel framework and is used to define web routes for the application.
// It is loaded by the RouteServiceProvider and all routes defined here will be assigned to the "web" middleware group.
// It is recommended to define your web routes in this file.
// You can create a controller using the command: php artisan make:controller NameOfController
// This will create a new controller file in the app/Http/Controllers directory. -->
<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DemoController;
//use App\Http\Controllers\DemoController; // Importing you created controller
Route::get('/first', [DemoController::class, 'first_example']);
Route::get('/signup', [DemoController::class, 'signup_form']);  
Route::post('/submit', [DemoController::class, 'submit_form']);        // new function in democontroller.php for form submission 
Route::get('/display', [DemoController::class, 'display_data']);

// Update and Delete Routes
// Route::get('/edit_form/{User_ID}', [DemoController::class, 'edit_data']);
// Route::post('/update_form/{User_ID}', [DemoController::class, 'update_form']);   
// Route::get('/delete_form/{User_ID}', [DemoController::class, 'delete_data']);

Route::get('/delete{delete_id}',[DemoController::class,'delete_user']);
Route::get('/edit_details{edit_id}',[DemoController::class,'edit_details']);
Route::post('/update_details',[DemoController::class,'update_details']);

