<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UsageGuideController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ExhbtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
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
    return view('main');
});
Route::post('login/check',[LoginController::class,'check']);
Route::get('login/logout', [LoginController::class,'logout']);




Route::get('login/mypage', function () {
    return view('mypage.mypage');
});

Route::get('/login', function () {
    return view('login.index');
})->name('login');

Route::get('/usageguide', function () {
    return view('usageGuide.index');
})->name('usageGuide');

Route::get('/qna', function () {
    return view('qna.index');
})->name('qna');

Route::get('/path', function () {
    return view('path.index');
})->name('path');

Route::get('/exhbt', function () {
    return view('exhbt.index');
})->name('exhbt');

Route::get('/ticket', function () {
    return view('ticket.index');
})->name('ticket');


Route::get('mypage/{mypage}', [ReservationController::class, 'show'])->name('mypage.show');

Route::get('admin/members', [AdminController::class, 'members'])->name('admin.members');
Route::resource( 'member', MemberController::class );
Route::resource( 'login', LoginController::class );
Route::resource('notice', NoticeController::class );
Route::resource('exhbt', ExhbtController::class );
Route::resource('usageGuide', UsageGuideController::class );
Route::resource('qna', QnaController::class );
Route::resource('path', PathController::class );
Route::resource('reservation', ReservationController::class );
Route::resource('mypage', ReservationController::class)->except('members');
Route::resource('admin', AdminController::class)->except('members');