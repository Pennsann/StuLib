<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Books List</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; background: #f4f6f9; }
    h2 { color: #2c3e50; }
    a.add-btn {
      display: inline-block;
      margin-bottom: 15px;
      padding: 8px 12px;
      background: #27ae60;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    table {
      width: 100%; border-collapse: collapse; background: #fff;
    }
    th, td {
      border: 1px solid #ddd; padding: 10px; text-align: left;
    }
    th { background: #2c3e50; color: #fff; }
  </style>
</head>
<body>
  <h2>Books List</h2>

  <a href="{{ route('admin.books.create') }}" class="add-btn">+ Add Book</a>

  <table>
    <thead>
      <tr>
        <th>ID</th><th>Title</th><th>Author</th><th>Category</th><th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->category }}</td>
        <td>{{ $book->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
