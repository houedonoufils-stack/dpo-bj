@extends('layouts.site')

@section('title', 'Comprendre le Livre V du Code du numérique')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Comprendre le Livre V en dix fiches</h1>
            <p class="lead">
                Livre V de la loi n° 2017-20 du 20 avril 2018 portant Code du numérique (articles 379 à 490),
                modifiée par la loi n° 2020-35. L'essentiel, sans jargon, avec les articles à retenir.
            </p>
            <nav class="chips" aria-label="Aller à une fiche">
                @foreach ($fiches as $fiche)
                    <a href="#{{ $fiche['slug'] }}">{{ $loop->iteration }}. {{ $fiche['titre'] }}</a>
                @endforeach
                <a href="#rgpd">Comparaison avec le RGPD</a>
            </nav>
        </div>
    </section>

    <section class="band">
        <div class="wrap grid g2">
            @foreach ($fiches as $fiche)
                <article class="card fiche" id="{{ $fiche['slug'] }}">
                    <span class="tag">Fiche {{ $loop->iteration }} · {{ $fiche['articles'] }}</span>
                    <h2 class="h3">{{ $fiche['titre'] }}</h2>
                    <p><b>{{ $fiche['resume'] }}</b></p>
                    <ul class="liste">
                        @foreach ($fiche['points'] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </section>

    <section class="band fond-ciel" id="rgpd">
        <div class="wrap">
            <h2>Ce qui change par rapport au RGPD</h2>
            <p class="mut" style="max-width:780px">
                Le Livre V reprend plusieurs outils du RGPD européen, mais garde un système de formalités préalables
                auprès de l'APDP. Une organisation habituée au RGPD ne peut donc pas s'en contenter.
            </p>
            <div class="scroll">
                <table class="tableau comp">
                    <thead>
                        <tr>
                            <th scope="col">Sujet</th>
                            <th scope="col">RGPD (Union européenne)</th>
                            <th scope="col">Livre V (Bénin)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comparaison as $ligne)
                            <tr>
                                <th scope="row">{{ $ligne['sujet'] }}</th>
                                <td class="mut">{{ $ligne['rgpd'] }}</td>
                                <td>{{ $ligne['benin'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="band">
        <div class="wrap row" style="justify-content:space-between">
            <div>
                <h2>Et pour votre organisme ?</h2>
                <p class="mut">Le diagnostic gratuit applique ces règles à votre situation en 10 questions.</p>
            </div>
            <a class="btn hot" href="{{ route('site.diagnostic') }}">Faire le diagnostic gratuit</a>
        </div>
    </section>

    <p class="small mut wrap" style="padding:0 max(5vw,16px) 24px">
        Fiches indicatives. Numérotation des articles à vérifier sur la version consolidée publiée par le SGG.
        Elles ne remplacent pas un avis juridique.
    </p>

@endsection