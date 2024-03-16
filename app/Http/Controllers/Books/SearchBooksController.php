<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class SearchBooksController extends Controller
{
    public function showSearchForm()
    {
        return view('books.search');
    }

    public function search(Request $request)
    {
        $now = Carbon::now();

        $data = Book::search($request->get('query'))
            ->paginate(5);

        $duration = Carbon::parse($now)->diffInMilliseconds(now());

        return response()->json([
            'duration' => $duration . 'ms' . ' | ' . $duration / 1000 . 's',
            'data' => $data
        ]);
    }
}
