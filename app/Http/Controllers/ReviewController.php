<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('books')->get();

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();

        return view('reviews.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $possibleScores = [
            "0", "0.5", "1", "1.5", "2", "2.5", "3", "3.5", "4", "4.5", "5", "5.5", "6", "6.5", "7", "7.5", "8", "8.5", "9", "9.5", "10"
        ];

        $validated = $request->validateWithBag('form-feedback', [
            'book_id' => ['required', 'integer'],
            'name' => ['required', 'min:2', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'link' => 'sometimes|nullable|string|active_url',
            'score' => [Rule::in($possibleScores)],
        ]);

        if ($validated['score'] === '0') {
            unset($validated['score']);
        }

        Review::create($validated);

        return redirect(route('home', '#reviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $Review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $books = Book::all();

        return view('reviews.edit', compact('review', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $possibleScores = [
            "0", "0.5", "1", "1.5", "2", "2.5", "3", "3.5", "4", "4.5", "5", "5.5", "6", "6.5", "7", "7.5", "8", "8.5", "9", "9.5", "10"
        ];

        $validated = $request->validateWithBag('form-feedback', [
            'book_id' => ['required', 'integer'],
            'name' => ['required', 'min:2', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:3'],
            'link' => 'sometimes|nullable|string|active_url',
            'score' => [Rule::in($possibleScores)],
        ]);

        if ($validated['score'] === '0') {
            unset($validated['score']);
            $validated['score'] = null;
        }

        $review->update($validated);

        return redirect(route('home', '#reviews'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return back();
    }
}
