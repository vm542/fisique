@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($problems as $problem)
                            <div class="col-sm-2">
                                <a href="/problemes/{{ $theme }}/{{ $subtheme }}/{{ $problem->id }}">
                                    <?php
                                        $color = 'alert-warning';
                                        if (auth()->user()->problems()->where('id', $problem->id)->count() == 0){
                                            $color = 'alert-warning';
                                        }
                                        else if (auth()->user()->problems()->where('id', $problem->id)->first()->pivot->solved){
                                            $color = 'alert-success';
                                        }
                                        else{
                                            $color = 'alert-danger';
                                        }
                                    ?>
                                    <div class="card mb-3 {{ $color }}">
                                      <div class="card-body">
                                        <h5 class="card-title">Problème {{ $problem->id }}</h5>
                                      </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
