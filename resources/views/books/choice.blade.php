@extends('layouts.app')

@section('content')
<div class="container form-container">

    <div class="panel is-primary">
        <div class="panel-heading">
            <span class="pr-3">
                <a href="{{ route('book.index') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
            </span>
            <span>
                Wat wil je doen?
            </span>
            
        </div>              
            <div class="panel-block">
                <div class="columns is-multiline">
                    <div class="column is-12">
                        <div class="button-wrap my-3">
                            <a href="{{ route('book.edit', $book) }}" class="button is-outlined is-primary">{{ $book->name }} aanpassen</a>
                            <a href="{{ route('files.create', $book) }}" class="button is-outlined is-primary">Afbeelding toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection