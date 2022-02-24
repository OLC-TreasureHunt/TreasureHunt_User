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
Route::get('/news/list', [App\Http\Controllers\NewsController::class, 'list'])->name('news.list');
Route::get('/news/{id}', [App\Http\Controllers\NewsController::class, 'news'])->name('news.detail')->where('id', '\d+');
Route::get('/news/popular', [App\Http\Controllers\NewsController::class, 'popular'])->name('news.popular');
Route::get('/news/top', [App\Http\Controllers\NewsController::class, 'top'])->name('news.top');
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'index'])->name('faqs');
Route::get('/faq/{id}', [App\Http\Controllers\FAQController::class, 'faq'])->name('faq.detail');
Route::get('/currency', [App\Http\Controllers\HistoryController::class, 'currency'])->name('currency');
Route::get('/download', [App\Http\Controllers\FileController::class, 'index'])->name('download');
Route::get('/download/files', [App\Http\Controllers\FileController::class, 'files'])->name('download.file');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
    Route::post('/setting/updateprofile', [App\Http\Controllers\SettingController::class, 'updateProfile'])->name('setting.updateprofile');
    Route::post('/setting/updatepassword', [App\Http\Controllers\SettingController::class, 'updatePassword'])->name('setting.updatepassword');

    Route::get('/createqrcode', [App\Http\Controllers\SettingController::class, 'createQrCode'])->name('payment.create_qr_code');

    Route::get('/tree', [App\Http\Controllers\TreeController::class, 'index'])->name('tree');
    Route::get('/tree/binary', [App\Http\Controllers\TreeController::class, 'binary'])->name('tree.binary');

    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
    Route::get('/history/game', [App\Http\Controllers\HistoryController::class, 'game'])->name('history.game');
    Route::get('/history/bonus', [App\Http\Controllers\HistoryController::class, 'bonus'])->name('history.bonus');

    Route::get('/notice', [App\Http\Controllers\NoticeController::class, 'index'])->name('notice');
    Route::get('/notice/list', [App\Http\Controllers\NoticeController::class, 'list'])->name('notice.list');
    Route::get('/notice/read/{id}', [App\Http\Controllers\NoticeController::class, 'read'])->name('notice.read');
    Route::get('/notice/alert', [App\Http\Controllers\NoticeController::class, 'alert'])->name('notice.alert');
});
