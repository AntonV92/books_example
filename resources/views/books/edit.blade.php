<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Book</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.update', $book->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                        </div>

                        <div class="form-group">
                            <label for="pub_date">Publication Date</label>
                            <input type="date" class="form-control" id="pub_date" name="pub_date" value="{{ $book->pub_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
