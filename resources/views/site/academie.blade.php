@extends('layouts.site')

@section('title', 'Académie dpo.bj')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Académie dpo.bj</h1>
            <p class="lead">
                Six formations au droit du numérique, au métier de DPO, à la cybersécurité
                et à la lutte contre la fraude, avec des travaux pratiques sur Sitael.
            </p>
            <a class="btn pri" href="{{ route('site.contact') }}">Être prévenu des prochaines sessions</a>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap">
            <h2>Apprendre en pratiquant</h2>
            <p>{{ config('apprendre.principe') }}</p>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Le catalogue</h2>
            <div class="grid g2" style="margin-top:14px">
                @foreach ($formations as $formation)
                    <article class="card offre" id="{{ strtolower($formation['code']) }}">
                        <div class="row">
                            <span class="tag t-n">{{ $formation['code'] }}</span>
                            <span class="tag">{{ $formation['duree'] }}</span>
                        </div>
                        <h3 style="margin-top:8px">{{ $formation['titre'] }}</h3>
                        <p class="mut small">{{ $formation['texte'] }}</p>

                        <p class="small"><b>Inspirée de :</b> {{ $formation['inspiree'] }}</p>
                        <p class="small"><b>Pour qui :</b> {{ $formation['public'] }}</p>
                        <p class="small"><b>Prérequis :</b> {{ $formation['prerequis'] }}</p>
                        <p class="small"><b>Format :</b> {{ $formation['format'] }}</p>

                        <p class="small" style="margin-bottom:4px"><b>Objectifs :</b></p>
                        <ul class="liste small">
                            @foreach ($formation['objectifs'] as $objectif)
                                <li>{{ $objectif }}</li>
                            @endforeach
                        </ul>

                        <p class="small"><b>Pratique sur Sitael :</b> {{ $formation['sitael'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap">
            <h2>Les parcours</h2>
            <p class="mut">Chaque formation réussie donne droit à une attestation de formation.</p>
            <div class="grid g4" style="margin-top:14px">
                @foreach (config('apprendre.parcours') as $parcours)
                    <article class="card">
                        <span class="tag">{{ $parcours['duree'] }}</span>
                        <h3 style="margin-top:8px">{{ $parcours['nom'] }}</h3>
                        <p class="mut small">{{ $parcours['modules'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band">
        <div class="wrap grid g2">
            <div class="card">
                <h3>Calendrier des sessions</h3>
                <p class="mut">Aucune session n'est encore programmée.</p>
                <p class="small">
                    Les dates, les liens de visio, les tarifs et l'inscription avec paiement
                    par Mobile Money seront publiés ici.
                </p>
                <a class="btn" href="{{ route('site.contact') }}">Me prévenir</a>
            </div>
            <div class="card">
                <h3>Après la formation : le quiz</h3>
                <p class="mut small">
                    Un quiz en ligne valide vos acquis : {{ config('academie.quiz.nombre_questions') }} questions,
                    {{ config('academie.quiz.note_reussite') }} % de bonnes réponses pour réussir.
                    Réussi, il vous donne droit à une attestation de formation, vérifiable par tous.
                </p>
                <a class="btn" href="{{ route('site.quiz') }}">Découvrir le quiz</a>
            </div>
        </div>
    </section>

@endsection