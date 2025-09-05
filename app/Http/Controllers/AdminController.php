<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class AdminController extends Controller
{
    // Admin dashboard with book filter
    public function dashboard(Request $request)
    {
        $status = $request->status ?? 'all'; // default to 'all'

        $booksQuery = Book::query();

        if ($status === 'available' || $status === 'unavailable') {
            $booksQuery->where('status', $status);
        }

        $books = $booksQuery->get();

        return view('admin.dashboard', compact('books', 'status'));
    }

    // Show the student search page
    public function showStudentSearch()
    {
        $students = null;
        return view('admin.students_search', compact('students'));
    }

    // Handle student search form submission
    public function searchStudentById(Request $request)
    {
        $request->validate([
            'student_id' => 'required|numeric'
        ]);

        $students = User::where('id', $request->student_id)
                        ->where('role', 'student')
                        ->get();

        return view('admin.students_search', compact('students'));
    }
}
