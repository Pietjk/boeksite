<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\File;
use App\Models\Post;
use App\Models\Book;

class ContentController extends Controller
{
    public function index(Post $post, Book $book, File $file)
    {
        // All post variables
        $aboutPost = $post->whereOrder(1)->get();
        $contactPost = $post->whereOrder(2)->get();
        // All book variables
        $books = $book->all();

        $featuredBook = $book->whereFeatured(true)->get();
        $featuredBookName =  strtolower(str_replace(' ', '', $featuredBook[0]->name));
        // All file variables
        $files = $file->all();

        $featuredHeader = $files->where('book_id', '=', $featuredBook[0]->id)->where('filename', '=', $featuredBookName.'header');
        $featuredCover = $files->where('book_id', '=', $featuredBook[0]->id)->where('filename', '=', $featuredBookName.'cover');
        $images = $files->filter(function($value, $key) {
            if (strpos($value->filename, 'cover') != false) {
                return $value;
            }
        });
        
        return view('home', compact('aboutPost', 'contactPost', 'books', 'featuredBook', 'featuredHeader', 'featuredCover', 'images'));
    }
}
// 'firstPost', 'secondPost', 'thirdPost'