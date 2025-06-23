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
Route::get('/admin_display_rout', [DemoController::class, 'display_all_data']);
//practice edit 
// Route::get('/edit_form/{User_ID}', [DemoController::class, 'edit_userdata']); 
// Route::get('/delete_form/{User_ID}', [DemoController::class, 'delete_data']);


// Update and Delete Routes
Route::get('/delete{delete_id}',[DemoController::class,'delete_user']);
Route::get('/edit_details{edit_id}',[DemoController::class,'edit_user_details']);
Route::post('/update_details',[DemoController::class,'update_details']);
// login with session 
Route ::get ('/signin_rout', [DemoController::class, 'user_login']);
Route::post('/login_details_rout',[DemoController::class,'login_details_check']);
Route::get('/login_display_rout',[DemoController::class,'user_display']);
//change passsword
Route::get('/change_pass_rout',[DemoController::class,'change_pass']);
Route::post('/change_pass_logic',[DemoController::class,'Newpass_logic']);
// Block Unblock
Route::get('/Auth_rout/{id}/{operation}', [DemoController::class, 'auth_logic'])
    ->name('auth_rout');
// Logout 
Route::get('/logout_rout',[DemoController::class,'logout_logic']);   // get method cause we dont modify any thing in db 



