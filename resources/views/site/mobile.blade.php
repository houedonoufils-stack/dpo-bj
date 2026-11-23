@extends('layouts.site')

@section('title', 'Sitael mobile')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Sitael mobile, l'outil de poche du DPO</h1>
            <p class="lead">
                Pour les DPO, référents métier et responsables du traitement, en déplacement et dans les zones
                à faible connexion. Chaque fonction existe aussi dans Sitael web.
            </p>
            <a class="btn pri" href="{{ route('site.logiciel') }}">Voir Sitael web</a>
        </div>
    </section>

    <section class="band">
        <div class="wrap">
            <h2>Écran par écran</h2>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($ecrans as $ecran)
                    <div class="card">
                        <span @class(['tag', 't-n' => $ecran['priorite'] !== 'P1'])>
                            {{ $ecran['priorite'] === 'P1' ? 'Version 1' : 'Version 1 si possible' }}
                        </span>
                        <h3 style="margin-top:8px">{{ $loop->iteration }}. {{ $ecran['titre'] }}</h3>
                        <p class="mut small">{{ $ecran['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap">
            <h2>Pensé pour le terrain béninois</h2>
            <table class="tableau">
                <tbody>
                    @foreach ($exigences as $sujet => $detail)
                        <tr>
                            <th scope="row">{{ $sujet }}</th>
                            <td>{{ $detail }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection