@extends('layouts.site')

@section('title', 'Quiz')

@section('content')
    @php($q = config('academie.quiz'))

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Le quiz de l'Académie dpo.bj</h1>
            <p class="lead">
                Après chaque formation, un quiz en ligne valide vos acquis. Réussi, il vous donne droit
                à une attestation de formation, vérifiable par tous.
            </p>
            <div class="row">
                <a class="btn pri" href="{{ route('login') }}">Accéder à mon quiz</a>
                <a class="btn" href="{{ route('site.academie') }}">Voir les formations</a>
            </div>
            <p class="small" style="margin-top:12px">
                Le quiz est réservé aux participants d'une formation de l'Académie, présents jusqu'à la fin de la session.
            </p>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Comment se passe le quiz</h2>
            <div class="grid g3" style="margin-top:14px">
                <div class="card">
                    <h3>{{ $q['nombre_questions'] }} questions</h3>
                    <p class="mut small">Des questions à choix multiples, avec parfois plusieurs bonnes réponses.</p>
                </div>
                <div class="card">
                    <h3>{{ intdiv($q['duree_minutes'], 60) }} heures</h3>
                    <p class="mut small">Le temps est limité ; à la fin, vos réponses sont envoyées automatiquement.</p>
                </div>
                <div class="card">
                    <h3>{{ $q['note_reussite'] }} % pour réussir</h3>
                    <p class="mut small">Vous voyez ensuite votre score et les thèmes à revoir.</p>
                </div>
                <div class="card">
                    <h3>{{ $q['essais_max'] }} essais</h3>
                    <p class="mut small">
                        {{ $q['delai_entre_essais_jours'] / 7 }} semaines entre deux essais. Après {{ $q['essais_max'] }} échecs,
                        il faut suivre une nouvelle session.
                    </p>
                </div>
                <div class="card">
                    <h3>Accès pendant {{ $q['acces_jours'] }} jours</h3>
                    <p class="mut small">Le quiz s'ouvre après la formation, une fois votre présence validée.</p>
                </div>
                <div class="card">
                    <h3>Une attestation vérifiable</h3>
                    <p class="mut small">Elle porte un numéro unique et un QR code, que chacun peut vérifier en ligne.</p>
                </div>
            </div>
        </div>
    </section>
@endsection