@extends('layouts.site')

@section('title', "Sitael, l'outil de gestion de la conformité")

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Sitael, l'outil qui gère votre conformité au Livre V</h1>
            <p class="lead">
                dpo.bj vous informe et vous accompagne. Sitael est l'outil avec lequel vous gérez au quotidien
                vos traitements, vos dossiers APDP, vos délais et vos preuves, sur le web et sur téléphone.
            </p>
            <div class="row">
                <a class="btn pri" href="{{ route('login') }}">Accéder à Sitael</a>
                <span class="btn desactive" aria-disabled="true">Télécharger l'application · bientôt disponible</span>
            </div>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Tous les outils du DPO et du responsable du traitement</h2>
            <p class="mut" style="max-width:780px">
                Chaque module applique les règles du Livre V et cite l'article concerné dans son aide.
            </p>
            <div class="grid g3" style="margin-top:18px">
                @foreach ($modules as $module)
                    <div @class(['card', 'card-phare' => $module['phare']])>
                        @if ($module['phare'])
                            <span class="tag t-warn">Module phare</span>
                        @endif
                        <h3 style="margin-top:8px">{{ $module['titre'] }}</h3>
                        <p class="mut small">{{ $module['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band fond-ciel" id="mobile">
        <div class="wrap">
            <h2>Sitael mobile, sur le terrain</h2>
            <p class="mut" style="max-width:780px">
                La version de poche de Sitael, pensée pour les déplacements et les zones à faible connexion.
                Chaque fonction existe aussi sur le web.
            </p>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($ecrans as $ecran)
                    <div class="card">
                        <h3>{{ $ecran['titre'] }}</h3>
                        <p class="mut small">{{ $ecran['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Un outil de conformité, lui-même conforme</h2>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($garanties as $garantie)
                    <div class="card">
                        <h3>{{ $garantie['titre'] }}</h3>
                        <p class="mut small">{{ $garantie['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap row" style="justify-content:space-between">
            <div>
                <h2>Prêt à commencer ?</h2>
                <p class="mut">Faites d'abord le diagnostic gratuit pour connaître vos formalités probables.</p>
            </div>
            <div class="row">
                <a class="btn hot" href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a>
                <a class="btn" href="{{ route('site.tarifs') }}">Voir les tarifs</a>
            </div>
        </div>
    </section>

@endsection