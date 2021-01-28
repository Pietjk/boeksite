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
                    Wat komt er in "{{ $currentPost }}" te staan?
                </span>
                
            </div>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <input type="hidden" name="type" value="{{ $currentPost }}">
                
                <div class="panel-block">
                    <div class="columns is-multiline">
                        
                        <div class="column is-12">
                            <label for="text" class="label">Titel</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ old('name') }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Text</label>
                                <textarea type="text" class="textarea" name="description" placeholder="Text">{{ old('description') }}</textarea>
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
@endsection