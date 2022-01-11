@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])
        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('news.index') }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Maak een nieuw nieuwsbericht aan
                </span>

            </div>
            <form action="{{ route('news.update', $news) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">De titel van het nieuwsbericht</label>
                                <input type="text" class="input" name="name" placeholder="Titel" value="{{ old('name') ?? $news->name }}">
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">De beschrijving van het nieuwsbericht</label>
                            <textarea type="text" class="textarea" name="description" placeholder="Text">{{ old('description') ?? $news->description }}</textarea>
                        </div>
                        <div class="column is-12">
                            <label for="text" class="label">Een link</label>
                                <input type="text" class="input" name="link" placeholder="Bijv. https://www.rubenkorfmaker.nl" value="{{ old('link') ?? $news->link }}">
                        </div>
                        @if ($news->image_path !== null)
                            <div class="column is-12">
                                <div class="box file-box">
                                    <label for="text" class="label">De huidige afbeelding</label>
                                    <img class="column is-2 is-4-touch" src="{{ asset($news->image_path) }}" alt="">
                                    <label class="checkbox label">
                                        <input type="checkbox" name="delete_image">
                                        Verwijder de afbeelding
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="column is-12">
                            <div class="box file-box is-fullwidth">
                                <div class="file file-upload has-name is-primary is-medium is-fullwidth" id="image-upload">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="image">
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
                                Updaten
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const imageInput = document.querySelector('#image-upload input[type=file]');

        imageInput.onchange = () => {
            if (imageInput.files.length > 0) {
                const fileName = document.querySelector('#image-upload .file-name');
                fileName.textContent = imageInput.files[0].name;
            }
        }
    </script>
@endsection
