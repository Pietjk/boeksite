<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
            'description' => ['required', 'string', 'min:3']
        ]);

        $isFeatured = $request->has('featured');
        $featuredBooks = Book::whereFeatured(true);

        if ($featuredBooks->isEmpty())
        {
            $isFeatured = true;
        }
        else 
        {
            if ($isFeatured)
            {
                $featuredBooks->update(['featured' => false]);
            }
        }
        
        // Create the book
        Book::create($validated + ['featured' => $isFeatured]);

        return redirect('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function feature(Request $request, Book $book)
    {
        Book::whereFeatured(true)->update(['featured' => false]);
        $book->update(['featured' => true]);
        return back();
    }
}