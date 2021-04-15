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
        $bookPost = $post->whereOrder(1)->first();
        $aboutPost = $post->whereOrder(2)->first();
        $contactPost = $post->whereOrder(3)->first();

        // if ($aboutPost  != null)
        // {
        //     $post
        // }
        // else
        // {
        //     $postImage = File::All();
        // }
        
        $postImage = File::where('type', '=', 'post')->first();
        // dd($postImage);

        // All book variables
        $books = $book->all();
        $books->load('files');
        $featuredBook = $books->where('featured',true)->first();

        if($featuredBook != null )
        {
            $bookId = $featuredBook->id;
        }
        else
        {
            $bookId = 1;
        }

        $featuredHeader = File::where('book_id', '=', $bookId)->where('type', '=', 'header')->get();
        $featuredCover = File::where('book_id', '=', $bookId)->where('type', '=', 'cover')->get();

        return view('home', compact('bookPost', 'aboutPost', 'contactPost', 'postImage', 'books', 'featuredBook', 'featuredHeader', 'featuredCover'));
    }
}
