@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">

                <div class="card-body p-5">
                    Ce site a été créé pour les amateurs de la physique souhaitant se préparer aux Olympiades Internationales de la Physique. Étant peu avancé dans le domaine, le site a été conçu de la façont à permettre à chacun d'ajouter des problèmes. Et le côté ludique facilite beaucoup les choses. De plus, chaque problème se voit attribuer un elo pour s'orienter dans la résolution. L'aspect ludique m'avait beaucoup aidé. Le groupe telegram.
                    @if (!auth()->user())
                        <p class="mt-3">
                            <a class="btn btn-primary" href="/login" role="button">Se connecter</a>
                            <a class="btn btn-secondary" href="/register" role="button">Créer un compte</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
