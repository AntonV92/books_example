<?php

namespace App\Interfaces;

use App\Models\Book;

interface BookRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @param $perPage
     * @return mixed
     */
    public function getAllPaginated($perPage = 10);

    /**
     * @param $page
     * @return mixed
     */
    public function getFromCurrentPage($page = 1);

    /**
     * @param int $id
     * @return Book
     */
    public function getById(int $id): Book;

    /**
     * @return array
     */
    public function getByTitle(): array;

    /**
     * @return array
     */
    public function getByAuthor(): array;

    /**
     * @return array
     */
    public function getByGenre(): array;

    /**
     * @param Book $book
     * @param array $data
     * @return mixed
     */
    public function update(Book $book, array $data);

    /**
     * @param Book $book
     * @return mixed
     */
    public function delete(Book $book);
}
