@extends('layouts.site')

@section('title', 'Conformité au Livre V du Code du numérique')

@section('content')
    <section class="band hero">
        <div class="wrap">
            <h1>Déclarez, faites autoriser et prouvez votre conformité au Livre V du Code du numérique</h1>
            <p class="lead">
                Sitael qualifie chacun de vos traitements, prépare vos dossiers sur les formulaires officiels
                de l'APDP et suit chaque délai jusqu'à la décision. Pour les responsables de traitement,
                les DPO et les cabinets.
            </p>
            <div class="row">
                <a class="btn pri" href="{{ route('site.diagnostic') }}">Tester mon niveau de conformité</a>
                <a class="btn" href="{{ route('site.contact') }}">Demander une démo</a>
                <a class="btn" href="{{ route('register') }}">Essayer gratuitement 15 jours</a>
            </div>
        </div>
    </section>
@endsection