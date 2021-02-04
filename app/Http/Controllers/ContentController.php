<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Book;

class ContentController extends Controller
{
    public function index(Post $post)
    {

        $aboutPost = $post->whereOrder(1)->get();
        $contactPost = $post->whereOrder(2)->get();
        $books = Book::all();
        $featuredBook = Book::whereFeatured(true)->get();
        
        return view('home', compact('aboutPost', 'contactPost', 'books', 'featuredBook'));
    }
}
// 'firstPost', 'secondPost', 'thirdPost'