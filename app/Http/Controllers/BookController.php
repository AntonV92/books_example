<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

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
            'books' => $this->bookRepository->getAll()
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
}
