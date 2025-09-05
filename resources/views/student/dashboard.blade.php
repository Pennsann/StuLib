<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard - Library</title>
  <style>
    body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f9; }
    header { background: #2c3e50; color: #fff; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
    header h1 { margin: 0; }
    .logout-btn { background: #e74c3c; color: #fff; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-size: 14px; }
    .container { display: flex; }
    nav { width: 220px; background: #34495e; color: #fff; min-height: 100vh; padding: 20px; }
    nav h3 { margin-top: 0; }
    nav ul { list-style: none; padding: 0; }
    nav ul li { margin: 15px 0; }
    nav ul li a { color: #ecf0f1; text-decoration: none; }
    main { flex: 1; padding: 20px; }
    .card { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
    .card h2 { margin-top: 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 10px; text-align: left; }
    th { background: #2c3e50; color: #fff; }
    .btn { padding: 6px 12px; margin: 0 3px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
    .btn-borrow { background: #27ae60; color: #fff; }
    .btn-return { background: #c0392b; color: #fff; }
    .search-bar { margin-bottom: 15px; display: flex; gap: 10px; }
    .search-bar input { flex: 1; padding: 6px 10px; border-radius: 4px; border: 1px solid #ccc; }
    .search-bar button { padding: 6px 12px; border-radius: 4px; border: none; background: #2980b9; color: #fff; cursor: pointer; }
  </style>
</head>
<body>
  <header>
    <h1>Student Dashboard</h1>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </header>

  <div class="container">
    <nav>
      <h3>Navigation</h3>
      <ul>
        <li><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
      </ul>
    </nav>

    <main>
      <!-- Borrowed Books Section -->
      <div class="card">
        <h2>My Borrowed Books</h2>
        @if($borrowedBooks->isEmpty())
            <p>You have not borrowed any books yet.</p>
        @else
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Borrow Date</th>
              <th>Return Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($borrowedBooks as $book)
            <tr>
              <td>{{ $book->id }}</td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->pivot->borrowed_at }}</td>
              <td>{{ $book->pivot->return_date }}</td>
              <td>
                <form action="{{ route('student.books.return', $book->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-return">Return</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>

      <!-- Available Books Section -->
      <div class="card">
        <h2>Available Books</h2>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('student.dashboard') }}" class="search-bar">
          <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by title or author">
          <button type="submit">Search</button>
        </form>

        @if($availableBooks->isEmpty())
            <p>No books available.</p>
        @else
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($availableBooks as $book)
            <tr>
              <td>{{ $book->id }}</td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->author }}</td>
              <td>{{ $book->category }}</td>
              <td>{{ $book->status }}</td>
              <td>
                <form action="{{ route('student.books.borrow', $book->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-borrow">Borrow</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @endif
      </div>
    </main>
  </div>
</body>
</html>
