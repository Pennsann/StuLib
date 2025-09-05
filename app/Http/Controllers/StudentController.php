<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Show dashboard with borrowed and available books (with optional search)
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        // Get borrowed books that are not yet returned
        $borrowedBooks = $user->borrowedBooks()->whereNull('returned_at')->get();


        // Get available books with optional search filter
        $query = Book::where('status', 'available');

        $search = $request->input('search', null);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%");
            });
        }

        $availableBooks = $query->get();

        return view('student.dashboard', compact('borrowedBooks', 'availableBooks', 'search'));
    }

    // Borrow a book
    public function borrow(Book $book)
    {
        $user = Auth::user();

        if ($book->status !== 'available') {
            return back()->with('error', 'Book is not available');
        }

        // Attach book to user with correct pivot columns
       $user->borrowedBooks()->attach($book->id, [
    'borrowed_at' => now(),
    'return_date' => now()->addDays(14),
    'returned_at' => null
]);


        $book->update(['status' => 'unavailable']);

        return back()->with('success', 'Book borrowed successfully');
    }

    // Return a book
    public function return(Book $book)
    {
        $user = Auth::user();

        // Check if the user has borrowed this book and not yet returned
        if (!$user->borrowedBooks()->wherePivot('returned_at', null)->where('book_id', $book->id)->exists()) {
            return back()->with('error', 'You did not borrow this book');
        }

        // Update pivot to mark as returned
        $user->borrowedBooks()->updateExistingPivot($book->id, [
    'returned_at' => now()
]);


        $book->update(['status' => 'available']);

        return back()->with('success', 'Book returned successfully');
    }
}
