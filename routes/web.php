<?php

use App\Http\Controllers\HelperController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectChoiceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Student 
    Route::post('student/search', [StudentController::class, 'search'])->name('student.search');
    Route::resource('student', StudentController::class);

    // SubjectChoice
    Route::get('subjectchoice/{student_id}/create', [SubjectChoiceController::class, 'create'])->name('subjectchoice.create');
    Route::post('subjectchoice/{subject}/select', [SubjectChoiceController::class, 'select'])->name('subjectchoice.select');

    // Subject
    Route::resource('subject', SubjectController::class);
    Route::resource('subjectchoice', SubjectChoiceController::class)->except('create');

    // Payment
    Route::get('payment/{subjectChoice}/make', [PaymentController::class, 'make'])->name('payment.make');
    Route::post('payment/{subjectChoice}/pay', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('payments', [PaymentController::class, 'index'])->name('payment.index');

    // Transaction
    Route::get('payment/status', [TransactionController::class, 'index'])->name('transaction.index');

    // Payment History
    Route::get('payment/history', [PaymentHistoryController::class, 'index'])->name('payment.history.index');

    // Dashboard
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('helper', [HelperController::class, 'index'])->name('helper.index');
