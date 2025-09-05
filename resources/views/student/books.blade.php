<!DOCTYPE html>
<html>
<head>
    <title>Available Books</title>
</head>
<body>
    <h1>Available Books</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>
                <form method="POST" action="#">
                    @csrf
                    <button type="submit">Borrow</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
