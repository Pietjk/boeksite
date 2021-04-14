@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('book.choice', $book) }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Update "{{ $book->name }}"
                </span>
            </div>
            <form action="{{ route('book.update', $book) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">De titel van het boek</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ (old('name') == '') ? $book->name : old('name') }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De beschrijving van het boek</label>
                            <textarea type="text" class="textarea" name="description" placeholder="Text">{{ (old('description') == '') ? $book->description : old('description') }}</textarea>
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De link naar de winkelpagina</label>
                                <input type="text" class="input" name="link" placeholder="Link" value="{{ (old('link') == '') ? $book->link : old('link') }}">
                        </div>
                        <div class="column is-12">
                            <div class="box">
                                <label for="text" class="checkbox">
                                    <input type="checkbox" name="featured"
                                    @if (empty(old()))
                                        {{ ($book->featured == 1) ? 'checked' : '' }}
                                    @else
                                        {{ (old('featured') != 'on') ? '' : 'checked' }}
                                    @endif
                                >
                                    Uitgelicht
                                </label>
                            </div>
                        </div>
                        <div class="column is-12">
                            <button type="submit" class="button is-outlined is-primary is-fullwidth">
                                Updaten
                            </button>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection