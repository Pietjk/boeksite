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
        $books->load('files');

        $featuredBook = $books->where('featured',true);

        if($featuredBook->count() > 0)
        {
            $featuredBookName = strtolower(str_replace(' ', '', $featuredBook[0]->name));    
            $featuredHeader = File::where('book_id', '=', $featuredBook[0]->id)->where('filename', '=', $featuredBookName.'header')->get();
            $featuredCover = File::where('book_id', '=', $featuredBook[0]->id)->where('filename', '=', $featuredBookName.'cover')->get();
        }
        else
        {
            $featuredHeader = File::all();
            $featuredCover = File::all();
        }

        return view('home', compact('aboutPost', 'contactPost', 'books', 'featuredBook', 'featuredHeader', 'featuredCover'));
    }
}
// 'firstPost', 'secondPost', 'thirdPost'
