<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\AuthController;

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
    return view('dashboard');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/voting', function () {
    return view('voting');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/tablevoting',[VotingController::class,'tbvotingview']);
Route::get('/pemilihan/tambah',[VotingController::class,'tambah']);
Route::post('/voting/storetambah',[VotingController::class,'storetambah']);
Route::get('/voting/hapus/{id}',[VotingController::class,'hapus']);
Route::get('/voting/edit/{id}',[VotingController::class,'edit']);
Route::post('/voting/update',[VotingController::class,'storeupdate']);


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);