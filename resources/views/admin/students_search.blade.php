<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Search - Admin</title>
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
    .btn-search { background: #2980b9; color: #fff; }
    .search-form { margin-bottom: 15px; }
    .search-form input { padding: 5px 10px; border-radius: 4px; border: 1px solid #ccc; }
  </style>
</head>
<body>
  <header>
    <h1>Student Search - Admin</h1>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </header>

  <div class="container">
    <nav>
      <h3>Navigation</h3>
      <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
      </ul>
    </nav>

    <main>
      <div class="card">
        <h2>Search Student by ID</h2>
        <form method="POST" action="{{ route('admin.users.search') }}" class="search-form">
          @csrf
          <input type="number" name="student_id" placeholder="Enter student ID" required>
          <button type="submit" class="btn btn-search">Search</button>
        </form>
      </div>

      <div class="card">
        <h2>All Students</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            @php
              $allStudents = \App\Models\User::where('role', 'student')->get();
            @endphp
            @foreach($allStudents as $student)
            <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->role }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @if(isset($students) && $students && count($students) > 0)
      <div class="card">
        <h2>Search Results</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $student)
            <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->role }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif

    </main>
  </div>
</body>
</html>
