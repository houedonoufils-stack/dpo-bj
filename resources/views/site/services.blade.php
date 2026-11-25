@extends('layouts.site')

@section('title', 'Services')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Nos services</h1>
            <p class="lead">
                Deux façons de vous aider : nous vous accompagnons dans votre mise en conformité,
                ou nous vous formons à Sitael pour exercer vous-même le métier de DPO.
            </p>
            <nav class="chips" aria-label="Aller à un service">
                <a href="#accompagnement">Accompagnement à la mise en conformité</a>
                <a href="#formation">Formation à Sitael et au métier de DPO</a>
            </nav>
        </div>
    </section>

    {{-- Offre 1 --}}
    <section class="band" id="accompagnement">
        <div class="wrap">
            <span class="tag">Offre 1 · sur devis</span>
            <h2 style="margin-top:10px">Accompagnement à la mise en conformité</h2>
            <p class="mut" style="max-width:780px">
                Nos équipes et nos cabinets partenaires prennent en charge tout ou partie de votre conformité
                au Livre V. Tout ce que nous produisons reste dans votre espace Sitael.
            </p>
            <div class="grid g3" style="margin-top:16px">
                @foreach ($accompagnement as $service)
                    <div class="card">
                        <h3>{{ $service['titre'] }}</h3>
                        <p class="mut small">{{ $service['texte'] }}</p>
                    </div>
                @endforeach
            </div>
            <a class="btn hot" href="{{ route('site.contact') }}" style="margin-top:18px">Demander un devis</a>
        </div>
    </section>

    {{-- Offre 2 --}}
    <section class="band fond-ciel" id="formation">
        <div class="wrap grid g2" style="align-items:center">
            <div>
                <span class="tag">Offre 2 · Académie dpo.bj</span>
                <h2 style="margin-top:10px">Formation à Sitael pour maîtriser le métier de DPO</h2>
                <p class="mut">
                    Des formations en ligne, en visio, pour devenir autonome : la loi, l'outil et les bons réflexes du DPO.
                </p>
                <div class="row" style="margin-top:14px">
                    <a class="btn pri" href="{{ route('site.academie') }}">Voir les formations</a>
                    <a class="btn" href="{{ route('site.quiz') }}">Le quiz et l'attestation</a>
                </div>
            </div>
            <div class="card">
                <h3>Ce que vous apprenez</h3>
                <ul class="liste">
                    @foreach ($formation as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

@endsection