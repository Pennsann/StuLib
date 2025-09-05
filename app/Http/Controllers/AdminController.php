<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $books = Book::all();
        return view('admin.dashboard',
        compact('books'));
    }
}
