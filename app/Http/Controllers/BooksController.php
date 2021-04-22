<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'link' => ['required', 'string', 'active_url'],
        ]);

        $featuredBooks = Book::whereFeatured(true);

        // Check if user wants the book to be featured or if there currently is a book that is featured
        if ($request->featured === null && $featuredBooks->count() !== 0)
        {
            $isFeatured = false;
        }
        elseif ($request->featured !== null || $featuredBooks->count() <= 0)
        {
            $isFeatured = true;
        }

        // Check if there are currently books that are featured if so remove the featured tag
        if ($isFeatured === true)
        {
            $featuredBooks->update(['featured' => false]);
        }

        // Create the book
        Book::create($validated + ['featured' => $isFeatured]);

        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'link' => ['required', 'string', 'starts_with:https://,http://']
        ]);

        $featuredBooks = Book::where('id', '!=', $book->id)->whereFeatured(true);

        // Check if user wants the book to be featured or if there currently is a book that is featured
        if ($request->featured === null && $featuredBooks->count() !== 0)
        {
            $isFeatured = false;
        }
        elseif ($request->featured !== null || $featuredBooks->count() == 0)
        {
            $isFeatured = true;
        }

        // Check if there are currently books that are featured if so remove the featured tag
        if ($isFeatured === true)
        {
            $featuredBooks->update(['featured' => false]);
        }

        // Create the book
        $book->update($validated + ['featured' => $isFeatured]);

        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // Change the current featured book
        if ($book->featured)
        {
            $newFeatured = Book::where('id', '!=', $book->id)->first();
            
            if ($newFeatured != null) {
                $newFeatured->update(['featured' => true]);
            }
        }

        // Delete the books files from storage
        $files = File::whereBookId($book->id);

        foreach ($files->pluck('filename') as $filename) {
            Storage::disk('public')->delete($filename.'.png');
        }
        
        // Delete the files and book from the database
        $files->delete();
        $book->delete();
        return back();
    }

    /**
     * Feature the specified book on the frontpage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function feature(Request $request, Book $book)
    {
        Book::whereFeatured(true)->update(['featured' => false]);
        $book->update(['featured' => true]);
        return back();
    }

    /**
     * Show the page for choosing between adding images and edditing the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choice(Book $book)
    {
        return view('books.choice', compact('book'));
    }
}
