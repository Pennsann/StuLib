<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category' => 'required|string',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'status' => 'available'
        ]);

        // Redirect to admin dashboard with success message
        return redirect()->route('admin.dashboard')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
        ]);

        $book->update($request->all());

        // Redirect to admin dashboard after update
        return redirect()->route('admin.dashboard')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Book deleted successfully!');
    }
}
