<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\File;
use App\Models\Post;
use App\Models\Book;
use App\Models\News;
use App\Models\Column;
use App\Models\Review;

class ContentController extends Controller
{
    public function home()
    {
        // All post variables
        $posts = Post::all();
        $bookPost = $posts->where('order', '=', 1)->first();
        $aboutPost = $posts->where('order', '=', 2)->first();
        $contactPost = $posts->where('order', '=', 3)->first();
        $blogPost = $posts->where('order', '=', 4)->first();
        $reviewPost = $posts->where('order', '=', 5)->first();
        $newsPost = $posts->where('order', '=', 6)->first();

        $columns = Column::all()->sortByDesc('created_at');

        $files = File::all();
        $postImage = $files->where('type', '=', 'post')->first();

        // All book variables
        $books = Book::with('files', 'reviews')->get();
        $featuredBook = $books->where('featured',true)->first();

        if($featuredBook != null )
        {
            $bookId = $featuredBook->id;
        }
        else
        {
            $bookId = 1;
        }

        // All review variables
        $reviews = Review::with('books')->get();
        $chosenReviews = [];

        foreach ($books as $book) {
            ${"reviewsFromBook$book->id"}[] = $reviews->where('book_id', '=', $book->id);

            if (!empty(${"reviewsFromBook$book->id"}[0]->toArray()))
            {
                $key = array_rand(${"reviewsFromBook$book->id"}[0]->toArray());
                ${"selectedReview$book->id"} = ${"reviewsFromBook$book->id"}[0][$key];
            }
            else
            {
                continue;
            }

            $chosenReviews[$book->id] = ${"selectedReview$book->id"};
        }

        shuffle($chosenReviews);

        $featuredHeader = $files->where('book_id', '=', $bookId)->where('type', '=', 'header')->first();
        $featuredCover = $files->where('book_id', '=', $bookId)->where('type', '=', 'cover')->first();

        $allNews = News::all();
        $news = $allNews->sortByDesc('created_at')->take(2);
        $newsCount = count($allNews);

        return view('home', compact(
            'posts',
            'bookPost',
            'aboutPost',
            'contactPost',
            'blogPost',
            'reviewPost',
            'newsPost',
            'columns',
            'postImage',
            'books',
            'featuredBook',
            'featuredHeader',
            'featuredCover',
            'chosenReviews',
            'news',
            'newsCount'
        ));
    }

    public function demo()
    {
        return view('demo.index');
    }
}
