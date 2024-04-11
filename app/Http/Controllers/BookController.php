<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use App\Services\FileCSVService;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;


/**
 * @class BookController
 */
class BookController extends Controller
{
    /**
     * @var BookRepositoryInterface
     */
    private BookRepositoryInterface $bookRepository;

    /**
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return Application
     */
    public function index()
    {
        return view('books.index', [
            'books' => $books = $this->bookRepository->getAllPaginated()
        ]);
    }

    /**
     * @return Application
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * @param StoreBookRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBookRequest $request)
    {
        $this->bookRepository->create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * @param int $id
     */
    public function show(int $id)
    {
        return view('books.show', [
            'book' => $this->bookRepository->getById($id)
        ]);
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        return view('books.edit', [
            'book' => $this->bookRepository->getById($id)
        ]);
    }

    /**
     * @param UpdateBookRequest $request
     * @param Book $book
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->bookRepository->update($book, $request->all());
        return redirect()->route('books.index');
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function destroy(Book $book)
    {
        $this->bookRepository->delete($book);
        return redirect()->route('books.index');
    }

    /**
     * @param int $page
     * @return StreamedResponse
     */
    public function export(int $page): StreamedResponse
    {
        $books = $this->bookRepository->getFromCurrentPage($page);
        $data = [
            ['Title', 'Author', 'Publication Date', 'Genre'],
        ];
        foreach ($books as $book) {
            $data[] = [$book->title, $book->author, $book->pub_date, $book->genre];
        }

        return FileCSVService::getExportFileStream($data, "books.csv");
    }
}
