@extends('layouts.site')

@section('title', "Formulaires de l'APDP")

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Formulaires de l'APDP</h1>
            <p class="lead">
                Les {{ $total }} documents publiés par l'APDP sur service.apdp.bj, relevés le {{ $releveLe }}.
                Consultation et téléchargement gratuits ; le préremplissage se fait dans Sitael.
            </p>

            {{-- Recherche : fonctionne sans JavaScript --}}
            <form class="recherche" method="GET" action="{{ route('site.formulaires') }}" role="search">
                <label for="q">Rechercher un formulaire</label>
                <div class="row">
                    <input id="q" name="q" type="search" value="{{ $q }}" placeholder="ex. transfert, capteurs, DPO" maxlength="100">
                    <button class="btn pri" type="submit">Rechercher</button>
                    @if ($q !== '')
                        <a class="btn" href="{{ route('site.formulaires') }}">Tout afficher</a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <p class="mut" aria-live="polite">
                @if ($q !== '')
                    {{ $formulaires->count() }} résultat(s) pour « {{ $q }} »
                @else
                    {{ $total }} formulaires
                @endif
            </p>

            <div class="grid g2">
                @forelse ($formulaires as $formulaire)
                    <article class="card">
                        <span class="tag">{{ $formulaire['categorie'] }} · {{ $formulaire['articles'] }}</span>
                        <h2 class="h3">{{ $formulaire['titre'] }}</h2>
                        <p class="mut small">{{ $formulaire['contenu'] }}</p>
                        <p class="small"><b>Requis quand :</b> {{ $formulaire['requis'] }}</p>

                        <details>
                            <summary>Notice de remplissage (dpo.bj)</summary>
                            <p>{{ $formulaire['notice'] }}</p>
                        </details>

                        <div class="row" style="margin-top:12px">
                            @if ($formulaire['telechargeable'])
                                <a class="btn pri" href="{{ asset('formulaires/'.$formulaire['fichier']) }}" download>Télécharger</a>
                            @else
                                <a class="btn pri" href="{{ $source }}" target="_blank" rel="noopener">Voir sur service.apdp.bj</a>
                            @endif
                            <a class="btn" href="{{ route('register') }}">Préremplir dans Sitael</a>
                        </div>
                        <p class="small mut" style="margin-top:8px">Source : {{ $source }} · relevé le {{ $releveLe }}</p>
                    </article>
                @empty
                    <div class="card">
                        <p>Aucun formulaire ne correspond à « {{ $q }} ».</p>
                        <a class="btn" href="{{ route('site.formulaires') }}">Voir tous les formulaires</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap grid g2">
            <div>
                <h2>Comment déposer un dossier</h2>
                <ul class="liste">
                    <li>Une lettre de couverture adressée au Président de l'APDP.</li>
                    <li>Les formulaires et pièces, envoyés par e-mail ou déposés au service accueil de l'APDP.</li>
                    <li>Un bordereau des pièces, conseillé.</li>
                    <li>Un récépissé avec un numéro de dossier ; gardez-le, il fait courir le délai de réponse (art. 412).</li>
                    <li>Les formalités sont gratuites.</li>
                </ul>
            </div>
            <div class="card">
                <h3>Loyauté</h3>
                <p class="small">
                    Les formulaires sont reproduits sans modification, mention d'information de l'APDP comprise,
                    avec leur source. Les notices de remplissage sont rédigées par dpo.bj.
                </p>
                <p class="small"><b>dpo.bj est un service privé, sans lien avec l'APDP.</b></p>
            </div>
        </div>
    </section>

@endsection