@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Problème {{ $problem->id }}</h3>
                    <p class="card-text">{{ $problem->description }}</p>
                    <p class="card-text">
                        @if($problem->format == 'integer' && empty($successMsg))
                             On demande une réponse entère.
                        @elseif (empty($successMsg))
                             On demande une réponse décimale, arrondie au millième près.
                        @endif
                    </p>

                    @if(!empty($successMsg))
                        <p class="card-text"><b><font color="green">Vous avez résolu cet exercice !</font></b></p>
                        <h5 class="card-title">Réponse</h3>
                        <p class="card-text">{{ $problem->solution }}
                            @if($problem->format == 'integer')
                                 (On demande une réponse entère)
                            @else
                                 (On demande une réponse décimale, arrondie au millième près)
                            @endif
                        </p>
                        <h5 class="card-title">Explication</h3>
                        <p class="card-text">{{ $problem->explanation }}</p>
                    @else
                        @if(session('error') || !empty($errorMsg))
                            <p class="card-text"><b><font color="red">Vous vous êtes trompé ! Veuillez réessayer ;)</font></b></p>
                        @endif
                        <form method="POST" class="form-inline" action="/problemes/{{$theme}}/{{$subtheme}}/{{$id}}/check">
                            @csrf
                            <div class="form-group">
                              <label for="solution"><b>Votre réponse :</b></label>
                              <input type="text" name="solution" id="solution" class="form-control mx-sm-3" aria-describedby="solution">
                              <button type="submit" class="btn btn-primary">Soumettre</button>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
