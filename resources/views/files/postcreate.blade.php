@extends('layouts.app')

@section('content')
    <div class="container form-container">
        
        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('post.edit', $post) }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Voeg bestanden toe
                </span>
                
            </div>
            <form action="{{ route('postfiles.store', $post) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="book" value="{{ $post->id }}">
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">De afbeelding</label>
                            <div class="box file-box">
                                <div class="file file-upload has-name is-primary is-medium is-fullwidth" id="post-upload">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="post">
                                        <span class="file-cta">
                                            <span class="file-icon">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <span class="file-label">
                                                Kies een bestand...
                                            </span>
                                        </span>
                                        <span class="file-name">
                                            Geen bestand geselecteerd
                                        </span>
                                    </label>
                                </div>
                            </div>
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
        const coverInput = document.querySelector('#post-upload input[type=file]');

        coverInput.onchange = () => {
            if (coverInput.files.length > 0) {
                const fileName = document.querySelector('#post-upload .file-name');
                fileName.textContent = coverInput.files[0].name;
            }
        }
    </script>
@endsection