<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Author;
use \Barryvdh\Debugbar\Facades\Debugbar;

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
    \App\Models\Book::factory()->create();

    Debugbar::startMeasure('render', 'Start querying now');

    $books = \App\Models\Book::limit(100)->get();

    foreach ($books as $book) {
        echo "Author of $book->title is " . $book->author->name;
    }

    Debugbar::stopMeasure('render', 'End now');
});
