<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // List all books
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    // Show form to create a new book
    public function create()
    {
        return view('admin.books.create');
    }

    // Store a new book
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

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
    }

    // Show form to edit a book
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    // Update a book
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
        ]);

        $book->update($request->all());

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }

    // Delete a book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }
}
