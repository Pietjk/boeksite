@extends('layouts.app')

@section('content')
    <div class="container form-container">
        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Alle boeken
                </span>
            </div>   
            <div class="panel-block">
                @if (!$books->isEmpty())
                    <div class="table-container">
                        <table class="table is-hoverable">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Beschrijving</th>
                                    <th class="table-checkbox">Uitgelicht</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->description }}</td>
                                        <td class="table-checkbox">
                                            <form action="{{ route('book.feature', $book) }}" method="post">
                                                @csrf
                                                <input type="checkbox" name="featured" 
                                                    @if($book->featured) 
                                                        checked disabled 
                                                    @endif 
                                                    onChange="this.form.submit()" 
                                                >
                                            </form>
                                        </td>
                                        <td><a href="{{ route('book.choice', $book) }}"><span class="edit-icon"><i class="far fa-edit"></i></span></a></td>
                                        <td>
                                            <form action="{{ route('book.destroy', $book) }}" method="post" id="deleteBook{{ $book->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" onclick="document.getElementById('deleteBook{{ $book->id }}').submit()">
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
                        <h1 class="is-size-4"><i class="fas fa-info-circle"></i><span> Er is op dit moment nog geen boek</span></h1>
                    </div>
                @endif
            </div>
        </div>
        <div class="box button-box">
            <a href="{{ route('book.create') }}" class="button is-primary is-outlined is-fullwidth">Voeg een nieuw boek toe</a>
        </div>
    </div>
@endsection