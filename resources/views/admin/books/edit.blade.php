<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Edit Book</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; background: #f4f6f9; }
    h2 { color: #2c3e50; }
    form {
      background: #fff; padding: 20px; border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1); max-width: 400px;
    }
    label { display: block; margin-top: 10px; }
    input, select {
      width: 100%; padding: 8px; margin-top: 5px;
      border: 1px solid #ccc; border-radius: 5px;
    }
    button {
      margin-top: 15px; padding: 10px 15px; border: none;
      border-radius: 5px; background: #27ae60; color: #fff; cursor: pointer;
    }
    a.back-link {
      display: inline-block; margin-top: 10px; text-decoration: none; color: #2c3e50;
    }
  </style>
</head>
<body>
  <h2>Edit Book</h2>

  <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>

    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required>

    <label for="category">Category</label>
    <input type="text" id="category" name="category" value="{{ old('category', $book->category) }}" required>

    <label for="status">Status</label>
    <select id="status" name="status" required>
      <option value="available" {{ $book->status == 'available' ? 'selected' : '' }}>Available</option>
      <option value="unavailable" {{ $book->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
    </select>

    <button type="submit">Update Book</button>
  </form>

  <a href="{{ route('admin.books.index') }}" class="back-link">← Back to Books</a>
</body>
</html>
