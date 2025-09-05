<?php

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function borrow(Book $book)
    {
        $user = Auth::user();
        $user->borrowedBooks()->attach($book->id, [
            'borrow_date' => now(),
            'return_date' => now()->addDays(14) // example 2 weeks
        ]);

        return back()->with('success', 'Book borrowed successfully!');
    }

    public function return(Book $book)
    {
        $user = Auth::user();
        $user->borrowedBooks()->updateExistingPivot($book->id, [
            'return_date' => now()
        ]);

        return back()->with('success', 'Book returned successfully!');
    }
}
