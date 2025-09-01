<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Library</title>
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
      text-align: center;
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

    .btn-add {
      background: #27ae60;
      color: #fff;
    }

    .btn-edit {
      background: #2980b9;
      color: #fff;
    }

    .btn-delete {
      background: #c0392b;
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <div class="container">
    <!-- Sidebar -->
    <nav>
      <h3>Navigation</h3>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Books</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Borrowed</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </nav>

    <!-- Main Content -->
    <main>
      <div class="card">
        <h2>Books Management</h2>
        <button class="btn btn-add">+ Add New Book</button>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>The Great Gatsby</td>
              <td>F. Scott Fitzgerald</td>
              <td>Classic</td>
              <td>Available</td>
              <td>
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>1984</td>
              <td>George Orwell</td>
              <td>Dystopian</td>
              <td>Borrowed</td>
              <td>
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Clean Code</td>
              <td>Robert C. Martin</td>
              <td>Programming</td>
              <td>Available</td>
              <td>
                <button class="btn btn-edit">Edit</button>
                <button class="btn btn-delete">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
