@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    @foreach($subthemes as $subtheme)
                        <a href="/problemes/{{ $theme }}/{{ $subtheme->url }}">
                            <div class="card mb-3">
                                <div class="card-body">
                                    {{ $subtheme->name }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
