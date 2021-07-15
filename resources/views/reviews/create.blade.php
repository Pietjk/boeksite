@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('review.index') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Maak een nieuwe review aan
                </span>

            </div>
            <form action="{{ route('review.store') }}" method="post">
                @csrf
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">Het boek</label>
                            <div class="select is-fullwidth">
                                <select name="book_id">
                                    <option value="" selected disabled>Selecteer een boek</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" {{ (old('book_id') === (string)$book->id) ? 'selected' : '' }}>{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De naam van de reviewer</label>
                                <input type="text" class="input" name="name" placeholder="Naam" value="{{ old('name') }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De review</label>
                            <textarea type="text" class="textarea" name="description" placeholder="Text">{{ old('description') }}</textarea>
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De gegeven score</label>
                            <div class="box range-box">
                                <div class="has-text-centered range-wrap">
                                    <input type="range" class="range" name="score" min="0" max="10" step="0.5" value="{{ old('score', 0) }}" id="range">
                                    <p class="tag is-black is-medium range-value" id="rangeV"></p>
                                </div>
                            </div>

                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De link naar de review</label>
                                <input type="text" class="input" name="link" placeholder="Bijv. https://www.rubenkorfmaker.nl" value="{{ old('link') }}">
                        </div>

                        <div class="column is-12">
                            <button type="submit" class="button is-outlined is-primary is-fullwidth">
                                Aanmaken
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const
        range = document.getElementById('range'),
        rangeV = document.getElementById('rangeV'),
        setValue = ()=>{
            const
            newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
            newPosition = 10 - (newValue * 0.2);
            console.log(newValue, newPosition);
            rangeValue = range.value;
            if (range.value == 0) {
                rangeValue = 'Geen Score'
            }
            rangeV.innerHTML = `<span>${rangeValue}</span>`;
            rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
        };
        document.addEventListener("DOMContentLoaded", setValue);
        range.addEventListener('input', setValue);
    </script>
@endsection
