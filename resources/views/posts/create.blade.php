@extends('layouts.app')

@section('content')
    <div class="container form-container">
        <div class="panel is-primary">
            <div class="panel-heading">
                Wat komt er in "{{ $currentPost }}" te staan?
            </div>
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <input type="hidden" name="order" value="{{ $currentPost }}">
                
                <div class="panel-block">
                    <div class="columns is-multiline">
                        
                        <div class="column is-12">
                            <label for="text" class="label">Titel</label>
                                <input type="text" class="input" name="name" placeholder="Titel">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Text</label>
                                <textarea type="text" class="textarea" name="description" placeholder="Text"></textarea>
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