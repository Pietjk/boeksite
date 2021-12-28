@extends('layouts.app')

@section('content')
    <div class="container form-container">
        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home', '#news') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Al het nieuws
                </span>
            </div>
            <div class="panel-block">
                @if (!$news->isEmpty())
                    <div class="table-container">
                        <table class="table is-hoverable">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Beschrijving</th>
                                    <th>link</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $newsItem)
                                    <tr>
                                        <td>{{ $newsItem->name }}</td>
                                        <td>{{ $newsItem->description }}</td>
                                        <td>@if($newsItem->link !== null) <a class="tag is-primary" href="{{ $newsItem->link }}" target="_blank">Bekijk</a> @else - @endif</td>
                                        <td>
                                            <a href="{{ route('news.edit', $newsItem) }}">
                                                <span class="edit-icon"><i class="far fa-edit"></i></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('news.destroy', $newsItem) }}" method="post" id="deletenewsItem{{ $newsItem->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" onclick="document.getElementById('deletenewsItem{{ $newsItem->id }}').submit()">
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
                        <h1 class="is-size-4"><i class="fas fa-info-circle"></i><span> Er is op dit moment nog geen nieuwsbericht</span></h1>
                    </div>
                @endif
            </div>
        </div>
        <div class="box button-box">
            <a href="{{ route('news.create') }}" class="button is-primary is-outlined is-fullwidth">Voeg een nieuw nieuwsbericht toe</a>
        </div>
    </div>
@endsection
