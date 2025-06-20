<?php

use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});

//route basic
Route::get('about', function () {
    return 'ini halaman welcome';
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('produk/{namaproduk}', function ($a) {
    return 'saya membeli <b>' . $a . '</b>';
});

Route::get('beli/{barang}/{jumlah}', function ($a, $b) {
    return view('beli', compact('a', 'b'));
});

Route::get('kategori/{namakategori?}', function ($nama = null) {
    if ($nama) {
        return 'Anda memilih kategori :' . $nama;
    } else {
        return 'anda belum memilih kategori';
    }

});

Route::get('barang/{barang?}/{kode?}', function ($barang = null, $kode = null) {
    return view('barang', compact('barang', 'kode'));
});

use Illuminate\Support\Facades\Route;

route::get('siswa', [MyController::class, 'index']);
route::post('/siswa', [MyController::class, 'store']);

route::get('siswa/{create}', [MyController::class, 'create']);
route::get('siswa/{id}', [MyController::class, 'show']);


//edit daata
route::get('siswa/{id}/edit', [MyController::class, 'edit']);

route::put('siswa/{id}', [MyController::class, 'update']);
route::delete('siswa/{id}', [MyController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
