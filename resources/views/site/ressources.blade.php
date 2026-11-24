@extends('layouts.site')

@section('title', 'Ressources et blog')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Ressources et blog</h1>
            <p class="lead">
                Actualités de l'APDP, guides pratiques, modèles à télécharger et webinaires
                pour appliquer le Livre V au quotidien.
            </p>
        </div>
    </section>

    <section class="band">
        <div class="wrap grid g2">
            <div class="card">
                <h2 class="h3">Actualités et guides</h2>
                <p class="mut">Les premiers articles arrivent bientôt.</p>
                <p class="small">En attendant, l'essentiel du Livre V est résumé en dix fiches.</p>
                <a class="btn pri" href="{{ route('site.livre-v') }}">Lire les fiches du Livre V</a>
            </div>
            <div class="card">
                <h2 class="h3">Webinaires</h2>
                <p class="mut">Aucun webinaire n'est encore programmé.</p>
                <a class="btn" href="{{ route('site.contact') }}">Être prévenu</a>
            </div>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap">
            <h2>Modèles en droit béninois</h2>
            <p class="mut" style="max-width:780px">
                Des documents prêts à adapter, rédigés à partir du Livre V. Ils seront disponibles
                en téléchargement et intégrés à Sitael.
            </p>
            <div class="grid g3" style="margin-top:14px">
                @foreach ($modeles as $modele)
                    <div class="card modele">
                        <span>{{ $modele }}</span>
                        <span class="tag t-n">Bientôt</span>
                    </div>
                @endforeach
            </div>
            <p class="small mut" style="margin-top:12px">
                Les formulaires officiels de l'APDP sont déjà disponibles :
                <a href="{{ route('site.formulaires') }}">voir la bibliothèque</a>.
            </p>
        </div>
    </section>

@endsection