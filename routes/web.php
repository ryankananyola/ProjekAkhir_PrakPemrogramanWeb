<?php
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
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

Route::get('/', function (){
    if (session()->has('userid')){
        return redirect('dashboard');
    }else{
        return redirect('login');
    }
});
Route::get('/register', function(){
    return view('register');
});
Route::get('/profile/{id}/{token}', [MemberController::class, "profile"]);
Route::get('/penjualan/{id}/{token}', [MemberController::class, "penjualan"]);
Route::get('/pembelian/{id}/{token}', [MemberController::class, "pembelian"]);
Route::get('/delJual/{id}', [MemberController::class, 'delJualan']);

Route::get('/regist', function(){
    return view('register');
});

Route::post('/regist', [LoginController::class, 'registration']);
Route::post('/login', [LoginController::class, "loginStart"]);
Route::post('/addJual', [MemberController::class, 'addJualan']);
Route::post('/updateJual', [MemberController::class, 'updateJualan']);
Route::post('/kirim_akun', [MemberController::class, 'kirimAkun']);
Route::get('/akhiri/{idTran}', [MemberController::class, 'akhiri']);
Route::post('/selesai/{idTran}', [MemberController::class, 'selesaiSeller']);
Route::post('/pesanPembeli', [MemberController::class, 'pesan_pembeli']);

Route::post('/kurang', [MemberController::class, 'pesan_pembeli']);

Route::get('/dashboard', [LoginController::class, "goToDashboard"]);
Route::get('/login', [LoginController::class, "index"]);
Route::get('/logout', function(){
    session()->flush();
    session()->regenerate();
    return redirect('login');
});
Route::get('/pasang/{userid}/{tranid}', [MemberController::class, 'ambilTran']);
Route::get('/handle/{userid}/{tranid}', [MemberController::class, 'handle']);
Route::get('/verified/{tranid}', [MemberController::class, 'verified']);
Route::get('/payyed/{tranid}', [MemberController::class, 'payyed']);
Route::get('/selesaikan/{tranid}', [MemberController::class, 'selesaikan']);
Route::get('/hapusTran/{tranid}', [MemberController::class, 'hapusTran']);
