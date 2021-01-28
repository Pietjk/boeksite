@extends('layouts.app')

@section('content')
    <div class="container form-container">
        <div class="panel is-primary">
            <div class="panel-heading">
                Update "{{ $post->name }}"
            </div>
            <form action="{{ route('post.update', $post) }}" method="post">
                @method('PATCH')
                @csrf
                
                <div class="panel-block">
                    <div class="columns is-multiline">
                        
                        <div class="column is-12">
                            <label for="text" class="label">Titel</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ $post->name }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Text</label>
                                <textarea type="text" class="textarea" name="description" placeholder="Text">{{ $post->description }}</textarea>
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