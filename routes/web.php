<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


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

Route::get('/books', [BookController::class, 'index'])->name('all_books');
Route::get('/delete/{id}/book', [BookController::class, 'destroy'])->name('delete_book');
Route::get('/show/{id}/book', [BookController::class, 'show'])->name('show_book');
Route::get('/add_book', [BookController::class, 'create'])->name('create_book');
Route::post('/add_book', [BookController::class, 'store'])->name('save_book');
Route::get('book/{id}/edit', [BookController::class, 'edit'])->name('edit_book');
Route::put('book/{id}/edit', [BookController::class, 'update'])->name('update_book');
Route::get('books/download/{filename}', [BookController::class, 'download'])->name('books.download');
Route::get('books/view/{filename}', [BookController::class, 'view'])->name('books.view');




require __DIR__.'/auth.php';
