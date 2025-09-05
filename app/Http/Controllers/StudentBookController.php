<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class StudentBookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // later we can filter borrowed
        return view('student.books', compact('books'));
    }
}
