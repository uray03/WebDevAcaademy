<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as UserAuthController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController as UserQuizController;
use App\Http\Controllers\CommunityController;

// ======= Public Routes ======= //
Route::get('/', fn () => view('home'));
Route::view('/tentang', 'tentang.index');

// ======= User Auth ======= //
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login']);
Route::get('/register', [UserAuthController::class, 'showRegister']);
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// ======= User Routes (Requires Auth) ======= //
Route::middleware('auth')->group(function () {
    // Komunitas
    Route::get('/komunitas', [CommunityController::class, 'index'])->name('community.index');
    Route::post('/komunitas/post', [CommunityController::class, 'storePost'])->name('community.post');
    Route::post('/komunitas/{post}/reply', [CommunityController::class, 'storeReply'])->name('community.reply');

    // Tambahan Edit & Hapus Post
    Route::get('/komunitas/{post}/edit', [CommunityController::class, 'editPost'])->name('community.post.edit');
    Route::put('/komunitas/{post}', [CommunityController::class, 'updatePost'])->name('community.post.update');
    Route::delete('/komunitas/{post}', [CommunityController::class, 'destroyPost'])->name('community.post.destroy');
    Route::get('/komunitas/reply/{id}/edit', [CommunityController::class, 'editReply'])->name('community.reply.edit');
    Route::put('/komunitas/reply/{id}', [CommunityController::class, 'updateReply'])->name('community.reply.update');
    Route::delete('/komunitas/reply/{id}', [CommunityController::class, 'destroyReply'])->name('community.reply.destroy');


    // Kursus
    Route::get('/kursus', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/kursus/{course}', [CourseController::class, 'show'])->name('courses.show');

    // Kuis
    Route::get('/kuis/{quiz}', [UserQuizController::class, 'show'])->name('quizzes.show');
    Route::post('/kuis/{quiz}', [UserQuizController::class, 'submit'])->name('quizzes.submit');

    // Sertifikat
    Route::get('/certificate/{quiz}', [UserQuizController::class, 'downloadCertificate'])->name('certificate.download');
});

// ======= Admin Routes ======= //
// ======= Admin Routes ======= //
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {

        // Courses
        Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
        Route::get('/courses/{course}', [AdminCourseController::class, 'show'])->name('courses.show');
        Route::get('/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('courses.edit');
        Route::put('/courses/{course}', [AdminCourseController::class, 'update'])->name('courses.update');
        Route::delete('/courses/{course}', [AdminCourseController::class, 'destroy'])->name('courses.destroy');

        // Modules
        Route::get('/courses/{course}/modules/create', [ModuleController::class, 'create'])->name('modules.create');
        Route::post('/courses/{course}/modules', [ModuleController::class, 'store'])->name('modules.store');
        Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
        Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
        Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
        Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');

        // Quizzes & Questions
        Route::get('/courses/{course}/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
        Route::post('/courses/{course}/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
        Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
        Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
        Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');

        // Kelola Pertanyaan
        Route::get('/quizzes/{quiz}/questions', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/quizzes/{quiz}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('questions.store');

    });
});

