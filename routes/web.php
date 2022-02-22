<?php

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
    return view('home');
});

Auth::routes();

Route::get('logout', function() {
    Auth::logout();
    return redirect()->route('home');
});

Route::get('activation/{token?}', [App\Http\Controllers\Auth\RegisterController::class, 'get_activation'])->name('activation.account');
Route::get('/lang/{locale}', [App\Http\Controllers\LanguageController::class, 'setLocale'])->name('lang');
Route::get('/contact', [App\Http\Controllers\ContactsController::class, 'index'])->name('contact');
Route::post('/contact/send', [App\Http\Controllers\ContactsController::class, 'send'])->name('contact.send');

Auth::routes(['verify' => true]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'news'])->name('news.detail');
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'index'])->name('faqs');
Route::get('/faq/{id}', [App\Http\Controllers\FAQController::class, 'faq'])->name('faq.detail');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::post('/setting/updateprofile', [App\Http\Controllers\SettingController::class, 'updateProfile'])->name('setting.updateprofile');
    Route::post('/setting/updatepassword', [App\Http\Controllers\SettingController::class, 'updatePassword'])->name('setting.updatepassword');

    Route::get('/createqrcode', [App\Http\Controllers\SettingController::class, 'createQrCode'])->name('payment.create_qr_code');

    Route::get('/tree', [App\Http\Controllers\TreeController::class, 'index'])->name('tree');
    Route::get('/tree/binary', [App\Http\Controllers\TreeController::class, 'binary'])->name('tree.binary');

    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
    Route::get('/history/game', [App\Http\Controllers\HistoryController::class, 'game'])->name('history.game');
});
