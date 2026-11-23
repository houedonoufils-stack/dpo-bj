@extends('layouts.site')

@section('title', $titre)

@section('content')
    <section class="band">
        <div class="wrap">
            <h1>{{ $titre }}</h1>
            <p class="mut">Page en construction. Son contenu sera ajouté aux prochaines étapes.</p>
            <a class="btn pri" href="{{ route('home') }}">Retour à l'accueil</a>
        </div>
    </section>
@endsection