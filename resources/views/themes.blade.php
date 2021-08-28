@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            @if(Auth::user()->email == "nicolas.maissouradze@gmail.com")
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('add-theme') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" type="text" name="name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                                <div class="col-md-6">
                                    <input id="url" class="form-control" type="text" name="url" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('add-subtheme') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="theme" class="col-md-4 col-form-label text-md-right">Thème</label>

                                <div class="col-md-6">
                                    <select id="theme" name="theme" class="form-control">
                                        @foreach($themes as $theme)
                                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" class="form-control" type="text" name="name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                                <div class="col-md-6">
                                    <input id="url" class="form-control" type="text" name="url" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('add-problem') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="theme" class="col-md-4 col-form-label text-md-right">Thème</label>

                            <div class="col-md-6">
                                <select id="theme" name="theme" class="form-control">
                                      @foreach($themes as $theme)
                                        <optgroup label = "{{ $theme->name }}">
                                        @foreach($theme->subthemes as $subtheme)
                                             <option value="{{ $subtheme->id }}">{{ $subtheme->name }}</option>
                                        @endforeach
                                      @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Énoncé (à rediger en latex : <a href="https://www.mathraining.be/chapters/13?type=10">tutoriel</a>)</label>

                            <div class="col-md-6">
                                <textarea onkeyup="updateInput(this.value)" id="description" class="form-control" type="text" name="description" required></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <label for="preview" class="col-md-4 col-form-label text-md-right">Prévisualisation</label>

                            <div class="col-md-6">
                                <textarea id="preview" class="form-control" type="text" name="preview" required disabled></textarea>
                            </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="solution" class="col-md-4 col-form-label text-md-right">Solution</label>

                            <div class="col-md-6">
                                <input id="solution" class="form-control" type="text" name="solution" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="explanation" class="col-md-4 col-form-label text-md-right">Explication (à rediger en latex : <a href="https://www.mathraining.be/chapters/13?type=10">tutoriel</a>)</label>

                            <div class="col-md-6">
                                <textarea id="explanation" class="form-control" type="text" name="explanation" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="format" class="col-md-4 col-form-label text-md-right">Format</label>

                            <div class="col-md-6 mt-2">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="format" id="integer" value="integer">
                                  <label class="form-check-label" for="integer">Entier</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="format" id="float" value="float">
                                  <label class="form-check-label" for="float">Décimale</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
