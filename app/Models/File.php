<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'filepath', 'book_id'];
    
    public function book()
    {
        return $this->where('filename', 'LIKE', '%cover%');

        // ->where('book_id', '=', '$bookId')
    }
}
