@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>Update Article</h1>

            <form method="POST" action="/articles/{{ $article->id }}">
                @csrf

                {{-- Because modern browsers only really understand GET and POST requests. --}}
                @method('PUT')

                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div>
                        <input class="input @error('title') 'is-danger' @enderror" type="text" name="title" id="title" value="{{ $article->title }}">

                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div>
                        <textarea class="textarea @error('excerpt') 'is-danger' @enderror" name="excerpt" id="excerpt">{{ $article->excerpt}}</textarea>

                        @error('excerpt')
                            <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') 'is-danger' @enderror" name="body" id="body">{{ $article->body}}</textarea>

                        @error('body')
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
