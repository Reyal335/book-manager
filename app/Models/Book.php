<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'publish_date'];
    /** @use HasFactory<\Database\Factories\BooksFactory> */

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    use HasFactory;
}
