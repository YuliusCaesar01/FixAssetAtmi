<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\TeamMemberController;
use App\Http\Controllers\Fixaset;
use Modules\ManagePermintaanNFA\app\Http\Controllers\ManagePermintaanNFAController;
use Modules\ManagePermintaanFA\app\Http\Controllers\ManagePermintaanFAController;

use Modules\ManageRuang\Http\Controllers\ManageRuangController;
use Modules\ManageTipe\Http\Controllers\ManageTipeController;
use Modules\ManageLokasi\Http\Controllers\ManageLokasiController;
use Modules\ManageKelompok\Http\Controllers\ManageKelompokController;
use Modules\ManageJenis\Http\Controllers\ManageJenisController;
use Modules\ManageUser\Http\Controllers\ProfileController;
use Modules\ManageUser\Http\Controllers\ManageUserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\EmailController;

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

Route::get('/admin', function () {
    return view('admin');
});


Route::prefix('/oauth')->group(function () {
    Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('oauth.google');
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('oauth.google.callback');
});

   

Route::redirect('/', '/auth/login'); //link utama langsung mengarahkan ke login
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login'); //penamaan route
    Route::post('login', [LoginController::class, 'processLogin']);
});

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::redirect('/main', '/main/dashboard');

Route::prefix('main')->middleware("auth")->group(function () {
    Route::get('teammember', [TeamMemberController::class, 'index'])->name('teammember');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('managepermintaannfa', [ManagePermintaanNFAController::class, 'index'])->name('managepermintaannfa');
    Route::resource('manage-tipe', ManageTipeController::class);
    Route::resource('manage-lokasi', ManageLokasiController::class);
    Route::resource('manage-kelompok', ManageKelompokController::class);
    Route::resource('manage-jenis', ManageJenisController::class);
    Route::resource('manage-ruang', ManageRuangController::class);
    Route::get('managepermintaannfa/approve', [ManagePermintaanNFAController::class, 'approve'])->name('managepermintaannfa.approve');

    //staff only
    Route::post('/storedata', [ManagePermintaanNFAController::class, 'store'])->name('storedata')->middleware('checkRole:staff');
    Route::put('/permintaan/{id}/selesai', [ManagePermintaanNFAController::class, 'markAsSelesai'])->name('markAsSelesai')->middleware('checkRole:staff');
    Route::post('/update-pengajuan/{id}', [ManagePermintaanNFAController::class, 'updatePengajuan'])->name('update.pengajuan')->middleware('checkRole:staff');
 
    //approvall
    Route::post('/permintaan/{aksi}/{id}', [ManagePermintaanNFAController::class, 'action'])->name('permintaan.action');
   // web.php
Route::post('/managepermintaanfa/approve', [ManagePermintaanFAController::class, 'approve'])->name('managepermintaanfa.approve');
Route::post('/managepermintaanfa/reject', [ManagePermintaanFAController::class, 'reject'])->name('managepermintaanfa.reject');
Route::post('/managepermintaanfa/tindakan', [ManagePermintaanFAController::class, 'tindakan'])->name('managepermintaanfa.tindakan');
Route::post('/bast/tindakan', [ManagePermintaanFAController::class, 'tindakan_bast'])->name('bast.tindakan');
Route::post('/bast/tindakanbast/{id}', [ManagePermintaanFAController::class, 'tindakanbast'])->name('bast.tindakanbast');
// routes/web.php
// routes/web.php
Route::get('/bast/pdf/{id}', [ManagePermintaanFAController::class, 'viewBast'])->name('bast.pdf');
Route::get('/pengajuan/pdf/{id}', [ManagePermintaanFAController::class, 'viewPengajuan'])->name('pengajuan.pdf');

Route::post('/bast/catat', [ManagePermintaanFAController::class, 'catat'])->name('bast.catat');

    
    //atasan only
    Route::post('/validasiatasan/{id}', [ManagePermintaanNFAController::class, 'validasiatasan'])->name('validasiatasan');

//sendemail
// routes/web.php
// routes/web.php
Route::get('/main/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
// routes/web.php
Route::post('/profile/editprofil', [ProfileController::class, 'update'])->name('editprofil');
// Route for changing password
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');




//userEdit
Route::group(['middleware' => ['checkRole:superadmin']], function () {
    Route::resource('manage-user', ManageUserController::class);
    Route::get('manage-user/userdetails/{id}', [ManageUserController::class, 'userdetails'])->name('manage-user.userdetails');
    Route::post('manage-user/userdetails/edit/{id}', [ManageUserController::class, 'edituserdetails'])->name('manage-user.edituserdetails');

});
//notif
Route::get('/notifprofile', [ManageUserController::class, 'notifprofil'])->name('notifprofile');


});
