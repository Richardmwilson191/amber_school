<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectChoiceController;
use App\Http\Controllers\SubjectController;
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
    Route::resource('student', StudentController::class);
    Route::post('student/search', [StudentController::class, 'search'])->name('student.search');
    Route::resource('subject', SubjectController::class);
    Route::resource('subjectchoice', SubjectChoiceController::class)->except('create');
    Route::get('subjectchoice/{student_id}/create', [SubjectChoiceController::class, 'create'])->name('subjectchoice.create');
    Route::post('subjectchoice/{subject}/select', [SubjectChoiceController::class, 'select'])->name('subjectchoice.select');

    Route::get('payment/{subjectChoice}/make', [PaymentController::class, 'make'])->name('payment.make');
    Route::post('payment/{subjectChoice}/pay', [PaymentController::class, 'pay'])->name('payment.pay');
});
