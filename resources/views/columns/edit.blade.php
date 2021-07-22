@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home', '#columns') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Update "{{ $column->name }}"
                </span>
            </div>
            <form action="{{ route('column.update', $column) }}" method="post">
                @method('PATCH')
                @csrf

                <div class="panel-block">
                    <div class="columns is-multiline">

                        <div class="column is-12">
                            <label for="text" class="label">Titel</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ (old('name') == '') ? $column->name : old('name') }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Text</label>
                                <textarea type="text" class="textarea" name="description" placeholder="Text" rows="20">{{ (old('description') == '') ? $column->description : old('description') }}</textarea>
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
