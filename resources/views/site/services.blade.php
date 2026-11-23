@extends('layouts.site')

@section('title', "Services d'accompagnement")

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Services d'accompagnement</h1>
            <p class="lead">
                Sur devis, par nos équipes et nos cabinets partenaires. Ils s'appuient sur Sitael :
                tout ce que nous produisons reste dans votre espace.
            </p>
            <a class="btn pri" href="{{ route('site.contact') }}">Demander un devis</a>
        </div>
    </section>

    <section class="band">
        <div class="wrap grid g3">
            @foreach ($services as $service)
                <div class="card">
                    <h3>{{ $service['titre'] }}</h3>
                    <p class="mut small">{{ $service['texte'] }}</p>
                    <b class="small">Ce que vous recevez</b>
                    <ul class="liste small">
                        @foreach ($service['livrables'] as $livrable)
                            <li>{{ $livrable }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap row" style="justify-content:space-between">
            <div>
                <h2>Vous voulez vous former ?</h2>
                <p class="mut">L'Académie dpo.bj propose des formations pratiques sur Sitael.</p>
            </div>
            <a class="btn" href="{{ route('site.academie') }}">Voir l'Académie</a>
        </div>
    </section>

@endsection