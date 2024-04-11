<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;

/**
 * @class BookRepository
 */
class BookRepository implements BookRepositoryInterface
{
    /**
     * @var Book
     */
    protected Book $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function getAll(): array
    {
        return $this->model->all()->all();
    }

    /**
     * @param int $id
     * @return Book
     */
    public function getById(int $id): Book
    {
        return $this->model::find($id);
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        $this->model::create($data);
    }

    public function getByAuthor(): array
    {
        return [];
    }

    public function getByGenre(): array
    {
        return [];
    }

    public function getByTitle(): array
    {
        return [];
    }

    /**
     * @param Book $book
     * @param array $data
     * @return void
     */
    public function update(Book $book, array $data)
    {
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->pub_date = $data['pub_date'];
        $book->genre = $data['genre'];
        $book->updated_at = time();
        $book->save();
    }

    public function delete(Book $book)
    {
        $book->delete();
    }
}
