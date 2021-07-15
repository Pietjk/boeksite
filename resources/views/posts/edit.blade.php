@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('home') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Update "{{ $post->name }}"
                </span>
            </div>
            <form action="{{ route('post.update', $post) }}" method="post">
                @method('PATCH')
                @csrf

                <div class="panel-block">
                    <div class="columns is-multiline">

                        <div class="column is-12">
                            <label for="text" class="label">Titel</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ (old('name') == '') ? $post->name : old('name') }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Text</label>
                                <textarea type="text" class="textarea" name="description" placeholder="Text" rows="20">{{ (old('description') == '') ? $post->description : old('description') }}</textarea>
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
        @if ($post->order === 2)
            <div class="box button-box">
                <a href="{{ route('postfiles.create', $post) }}" class="button  is-primary is-outlined is-fullwidth">Voeg een foto toe</a>
            </div>
        @endif
    </div>
@endsection
