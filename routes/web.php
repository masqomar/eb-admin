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

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', fn () => view('dashboard'));
    Route::get('/dashboard', fn () => view('dashboard'));

    Route::get('/profile', App\Http\Controllers\ProfileController::class)->name('profile');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleAndPermissionController::class);
});

Route::resource('announcements', App\Http\Controllers\AnnouncementController::class)->middleware('auth');
Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');
Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('auth');
Route::resource('faqs', App\Http\Controllers\FaqController::class)->middleware('auth');
Route::resource('periods', App\Http\Controllers\PeriodController::class)->middleware('auth');
Route::resource('program-types', App\Http\Controllers\ProgramTypeController::class)->middleware('auth');
Route::resource('programs', App\Http\Controllers\ProgramController::class)->middleware('auth');
Route::resource('tenants', App\Http\Controllers\TenantController::class)->middleware('auth');
Route::resource('commissions', App\Http\Controllers\CommissionController::class)->middleware('auth');
Route::resource('coupons', App\Http\Controllers\CouponController::class)->middleware('auth');
Route::resource('value-categories', App\Http\Controllers\ValueCategoryController::class)->middleware('auth');
Route::resource('detail-value-categories', App\Http\Controllers\DetailValueCategoryController::class)->middleware('auth');
Route::resource('question-titles', App\Http\Controllers\QuestionTitleController::class)->middleware('auth');
Route::resource('questions', App\Http\Controllers\QuestionController::class)->middleware('auth');
Route::resource('exams', App\Http\Controllers\ExamController::class)->middleware('auth');
Route::resource('grades', App\Http\Controllers\GradeController::class)->middleware('auth');
Route::resource('grade-details', App\Http\Controllers\GradeDetailController::class)->middleware('auth');
Route::resource('students', App\Http\Controllers\StudentController::class)->middleware('auth');
Route::resource('transactions', App\Http\Controllers\TransactionController::class)->middleware('auth');
Route::resource('transaction-details', App\Http\Controllers\TransactionDetailController::class)->middleware('auth');

// SMM Menu
Route::resource('smm-providers', App\Http\Controllers\SmmProviderController::class)->middleware('auth');
Route::get('smm-services', [App\Http\Controllers\SmmLayananController::class, 'index'])->name('smm-services.index')->middleware('auth');
Route::get('smm-services/order', [App\Http\Controllers\SmmLayananController::class, 'order'])->name('smm-service.order')->middleware('auth');
Route::post('smm-services/submit-order', [App\Http\Controllers\SmmLayananController::class, 'submitOrder'])->name('smm-service.submit-order')->middleware('auth');
Route::get('smm-order-histories', [App\Http\Controllers\SmmLayananController::class, 'orderHistoy'])->name('smm-service.order-history')->middleware('auth');
Route::post('smm-cek-status', [App\Http\Controllers\SmmLayananController::class, 'cekStatus'])->name('smm-service.cek-status')->middleware('auth');