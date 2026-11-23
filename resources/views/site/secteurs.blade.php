@extends('layouts.site')

@section('title', 'Solutions par secteur')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Solutions par secteur</h1>
            <p class="lead">
                Les traitements courants de votre secteur, les formalités qu'ils demandent le plus souvent
                et les points d'attention du Livre V.
            </p>
            {{-- Raccourcis vers chaque secteur --}}
            <nav class="chips" aria-label="Aller à un secteur">
                @foreach ($secteurs as $secteur)
                    <a href="#{{ $secteur['slug'] }}">{{ $secteur['titre'] }}</a>
                @endforeach
            </nav>
        </div>
    </section>

    @foreach ($secteurs as $secteur)
        <section @class(['band', 'fond-ciel' => $loop->even]) id="{{ $secteur['slug'] }}">
            <div class="wrap">
                <h2>{{ $secteur['titre'] }}</h2>
                <div class="grid g3" style="margin-top:14px">
                    <div class="card">
                        <h3>Traitements types</h3>
                        <ul class="liste">
                            @foreach ($secteur['traitements'] as $traitement)
                                <li>{{ $traitement }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card">
                        <h3>Formalités fréquentes</h3>
                        <ul class="liste">
                            @foreach ($secteur['formalites'] as $formalite)
                                <li>{{ $formalite }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card alerte">
                        <h3>Points d'attention</h3>
                        <ul class="liste">
                            @foreach ($secteur['attention'] as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="band">
        <div class="wrap row" style="justify-content:space-between">
            <div>
                <h2>Votre secteur n'est pas dans la liste ?</h2>
                <p class="mut">Le diagnostic gratuit fonctionne pour tous les organismes, publics comme privés.</p>
            </div>
            <a class="btn hot" href="{{ route('site.diagnostic') }}">Faire le diagnostic gratuit</a>
        </div>
    </section>

    <p class="small mut wrap" style="padding:0 max(5vw,16px) 24px">
        Contenu indicatif, établi à partir du Livre V du Code du numérique. Il ne remplace pas un avis juridique.
    </p>

@endsection