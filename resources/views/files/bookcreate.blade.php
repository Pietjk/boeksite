@extends('layouts.app')

@section('content')
    <div class="container form-container">

        @include('components._error', ['bag' => 'form-feedback'])

        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('book.choice', $book) }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Voeg bestanden toe
                </span>

            </div>
            <form action="{{ route('files.store', $book) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="book" value="{{ $book->id }}">
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">De <b>BOEK OMSLAG</b> afbeelding</label>
                            <div class="box file-box">
                                <div class="file file-upload has-name is-primary is-medium is-fullwidth" id="cover-upload">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="bookCover">
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
                            <label for="text" class="label">De <b>HEADER</b> afbeelding</label>
                            <div class="box file-box">
                                <div class="file file-upload has-name is-primary is-medium is-fullwidth" id="header-upload">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="bookHeader">
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
        <div class="panel is-primary">
            <div class="panel-heading">
                <span class="pr-3">
                    <a href="{{ route('book.choice', $book) }}" class="button is-primary is-small"><i class="fas fa-arrow-left"></i></a>
                </span>
                <span>
                    Voeg bestanden toe
                </span>

            </div>
            <form action="{{ route('pdfs.store', $book) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="book" value="{{ $book->id }}">
                <div class="panel-block">
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <label for="text" class="label">Het <b>PDF</b>-document</label>
                            <div class="box file-box">
                                <div class="file file-upload has-name is-primary is-medium is-fullwidth" id="pdf-upload">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="bookPdf">
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
        const coverInput = document.querySelector('#cover-upload input[type=file]');
        const headerInput = document.querySelector('#header-upload input[type=file]');
        const pdfInput = document.querySelector('#pdf-upload input[type=file]');

        coverInput.onchange = () => {
            if (coverInput.files.length > 0) {
                const fileName = document.querySelector('#cover-upload .file-name');
                fileName.textContent = coverInput.files[0].name;
            }
        }
        headerInput.onchange = () => {
            if (headerInput.files.length > 0) {
                const fileName = document.querySelector('#header-upload .file-name');
                fileName.textContent = headerInput.files[0].name;
            }
        }
        pdfInput.onchange = () => {
            if (pdfInput.files.length > 0) {
                const fileName = document.querySelector('#pdf-upload .file-name');
                fileName.textContent = pdfInput.files[0].name;
            }
        }
    </script>
@endsection
