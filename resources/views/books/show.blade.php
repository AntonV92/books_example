<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $book->title }}</div>

                <div class="card-body">
                    <p><strong>Title:</strong> {{ $book->title }}</p>
                    <p><strong>Author:</strong> {{ $book->author }}</p>
                    <p><strong>Publication Date:</strong> {{ $book->pub_date }}</p>
                    <p><strong>Genre:</strong> {{ $book->genre }}</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
