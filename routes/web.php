<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Testing\TestView;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/search', [BookController::class, 'search'])->name('search');
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/TestView', function (){
    $books = Book::paginate(12);

    $books->withPath('/testview/');
});

