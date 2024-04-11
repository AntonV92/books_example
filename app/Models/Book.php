<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $pub_date
 * @property string $genre
 * @property string $created_at
 * @property string $updated_at
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'pub_date',
        'genre',
        'created_at',
        'updated_at',
    ];
}
