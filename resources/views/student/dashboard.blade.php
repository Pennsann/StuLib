<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard - Library</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f6f9;
    }

    header {
      background: #2c3e50;
      color: #fff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      margin: 0;
    }

    .logout-btn {
      background: #e74c3c;
      color: #fff;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      text-decoration: none;
    }

    .container {
      display: flex;
    }

    nav {
      width: 220px;
      background: #34495e;
      color: #fff;
      min-height: 100vh;
      padding: 20px;
    }

    nav h3 {
      margin-top: 0;
    }

    nav ul {
      list-style: none;
      padding: 0;
    }

    nav ul li {
      margin: 15px 0;
    }

    nav ul li a {
      color: #ecf0f1;
      text-decoration: none;
    }

    main {
      flex: 1;
      padding: 20px;
    }

    .card {
      background: #fff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .card h2 {
      margin-top: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background: #2c3e50;
      color: #fff;
    }

    .btn {
      padding: 6px 12px;
      margin: 0 3px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-borrow {
      background: #27ae60;
      color: #fff;
    }

    .btn-return {
      background: #c0392b;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <h1>Student Dashboard</h1>
    <form action="/logout" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </header>

  <div class="container">
    <nav>
      <h3>Navigation</h3>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">My Borrowed Books</a></li>
        <li><a href="#">Browse Books</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </nav>

    <main>
      <div class="card">
        <h2>My Borrowed Books</h2>
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
            <tr>
              <td>101</td>
              <td>The Great Gatsby</td>
              <td>2025-08-01</td>
              <td>2025-08-15</td>
              <td><button class="btn btn-return">Return</button></td>
            </tr>
            <tr>
              <td>102</td>
              <td>Clean Code</td>
              <td>2025-08-05</td>
              <td>2025-08-19</td>
              <td><button class="btn btn-return">Return</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card">
        <h2>Available Books</h2>
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
            <tr>
              <td>201</td>
              <td>1984</td>
              <td>George Orwell</td>
              <td>Dystopian</td>
              <td>Available</td>
              <td><button class="btn btn-borrow">Borrow</button></td>
            </tr>
            <tr>
              <td>202</td>
              <td>Design Patterns</td>
              <td>Erich Gamma</td>
              <td>Programming</td>
              <td>Available</td>
              <td><button class="btn btn-borrow">Borrow</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
