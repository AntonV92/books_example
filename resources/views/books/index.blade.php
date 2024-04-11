<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book List</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publication Date</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->pub_date }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <a href="books/create"> Add new book</a>
                </div>
            </div>
        </div>
    </div>
</div>
