<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\MatkulController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     echo "Selamat Datang";
// });

// Route::get('/about', function () {
//     echo "2141720028 - Ahmad Rifki Fauzi";
// });

// Route::get('/articles/{id}', function ($id) {
//     echo "Halaman Artikel dengan ID ".$id;
// });

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/about', [AboutController::class, 'index']);
// Route::get('/articles/{id}', [ArticleController::class, 'show']);

// Route::get('/', [PageController::class, 'home']);
// Route::prefix('product')->group(function () {
//     Route::get('/list', [PageController::class, 'product']);
// });

// Route::get('/news/{param}', [PageController::class, 'news']);

// Route::prefix('program')->group(function () {
//     Route::get('/list', [PageController::class, 'program']);
// });

// Route::get('/about', [PageController::class, 'about']);

// Route::resource('contact', pageController::class);


// Pertemuan 3
    // praktikum 1

    // Route::get('/', [HomeController::class, 'index']);

    // Route::prefix('product')->group(function () {
    //     Route::get('/list', [PageController::class, 'product']);
    // });

    // Route::get('/news/{param}', [HomeController::class, 'news']);

    // Route::prefix('program')->group(function () {
    //     Route::get('/list', [HomeController::class, 'program']);
    // });

    // Route::get('/about', [HomeController::class, 'about']);

    // Route::resource('contact', HomeController::class);


Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // praktikum 2

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/kuliah', [KuliahController::class, 'index']);

//pertemuan 4

    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/hobby', [HobbyController::class, 'index']);
    Route::get('/keluarga', [KeluargaController::class, 'index']);
    Route::get('/matkul', [MatkulController::class, 'index']);

//Pertemuan 7
    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');

    Route::post('/mahasiswa/data', [MahasiswaController::class, 'data']);
//Pertemuan 10
    Route::get('/articles/cetak', [ArticleController::class, 'cetak_pdf']);
    Route::resource('/articles', ArticleController::class);
    Route::get('cetak/khs/{id}', [MahasiswaController::class, 'cetak_khs']);
});

//Pertemuan 12
