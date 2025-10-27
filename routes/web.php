<?php

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ROTTA ADMIN: creazione esame
Route::get('admin/exams/create', [ExamController::class, 'createExam'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.');

//ROTTA SUPERVISOR: assegnazione voto esami
Route::patch('exams/{exam}/vote', [ExamController::class, 'assignVote'])
    ->middleware(['auth', 'role:supervisor'])
    ->name('supervisor.exams.assignVote');

//ROTTA USER: visualizzazione esami
Route::get('my-exams', [ExamController::class, 'myExams'])
    ->middleware(['auth', 'role:user'])
    ->name('user.exams.index');


require __DIR__ . '/auth.php';
