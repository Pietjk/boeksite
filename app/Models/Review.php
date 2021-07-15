<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'name', 'description', 'score', 'link'];

    public function Books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
