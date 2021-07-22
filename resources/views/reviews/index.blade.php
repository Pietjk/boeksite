@extends('layouts.app')

@section('content')
    <div class="container form-container">
        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home', '#reviews') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Alle reviews
                </span>
            </div>
            <div class="panel-block">
                @if (!$reviews->isEmpty())
                    <div class="table-container">
                        <table class="table is-hoverable">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Beschrijving</th>
                                    <th>score</th>
                                    <th>link</th>
                                    <th>boek</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->description }}</td>
                                        <td>@if($review->score !== null) {{ $review->score }} @else - @endif</td>
                                        <td>@if($review->link !== null) <a class="tag is-primary" href="{{ $review->link }}" target="_blank">Bekijk</a> @else - @endif</td>
                                        <td>{{ $review->books->name }}</td>
                                        <td>
                                            <a href="{{ route('review.edit', $review) }}">
                                                <span class="edit-icon"><i class="far fa-edit"></i></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('review.destroy', $review) }}" method="post" id="deleteReview{{ $review->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" onclick="document.getElementById('deleteReview{{ $review->id }}').submit()">
                                                    <span class="delete-icon"><i class="far fa-trash-alt"></i></span>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="info-box has-text-centered">
                        <h1 class="is-size-4"><i class="fas fa-info-circle"></i><span> Er is op dit moment nog geen review</span></h1>
                    </div>
                @endif
            </div>
        </div>
        <div class="box button-box">
            <a href="{{ route('review.create') }}" class="button is-primary is-outlined is-fullwidth">Voeg een nieuwe review toe</a>
        </div>
    </div>
@endsection
