@extends('layouts.site')

@section('title', 'Académie dpo.bj')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Académie dpo.bj</h1>
            <p class="lead">
                Six formations pratiques au Livre V, avec des travaux pratiques sur Sitael
                à partir d'une organisation fictive.
            </p>
            <a class="btn pri" href="{{ route('site.contact') }}">Être prévenu des prochaines sessions</a>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Le catalogue</h2>
            <div class="grid g3" style="margin-top:14px">
                @foreach ($formations as $formation)
                    <article class="card offre">
                        <span class="tag">{{ $formation['duree'] }}</span>
                        <h3 style="margin-top:8px">{{ $formation['titre'] }}</h3>
                        <p class="mut small">{{ $formation['texte'] }}</p>
                        <p class="small liste"><b>Pour qui :</b> {{ $formation['public'] }}</p>
                    </article>
                @endforeach
            </div>
            <p class="small mut" style="margin-top:12px">
                Intitulés provisoires : le programme détaillé de chaque formation sera publié à l'ouverture des inscriptions.
            </p>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap grid g2">
            <div class="card">
                <h3>Calendrier des sessions</h3>
                <p class="mut">Aucune session n'est encore programmée.</p>
                <p class="small">
                    Les dates, les lieux (Cotonou ou en ligne), les tarifs et l'inscription avec paiement
                    par Mobile Money seront publiés ici.
                </p>
                <a class="btn" href="{{ route('site.contact') }}">Me prévenir</a>
            </div>
            <div class="card">
                <h3>Former vos équipes sur place</h3>
                <p class="mut small">
                    Une formation dans vos locaux, adaptée à votre secteur et à vos traitements.
                </p>
                <a class="btn" href="{{ route('site.contact') }}">Demander un devis</a>
            </div>
        </div>
    </section>

@endsection