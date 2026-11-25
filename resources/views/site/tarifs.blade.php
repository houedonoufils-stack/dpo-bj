@extends('layouts.site')

@section('title', 'Tarifs')

@section('content')

    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap">
            <h1>Des offres en FCFA, payables par Mobile Money</h1>
            <p class="lead">
                Essai gratuit de {{ $essaiJours }} jours, sans moyen de paiement. Montants hors taxes,
                TVA de {{ $tva * 100 }} % en sus.
            </p>

            {{-- Choix mensuel / annuel : deux liens, sans JavaScript --}}
            <p style="margin-top:18px"><span class="tag t-warn">Annuel · {{ $moisOfferts }} mois offerts</span></p>
        </div>
    </section>

    <section class="band">
        <div class="wrap grid g4 offres">
            @foreach ($offres as $offre)
                <article @class(['card', 'offre', 'offre-phare' => $offre['mise_en_avant']])>
                    @if ($offre['mise_en_avant'])
                        <span class="tag t-warn">Le plus choisi</span>
                    @endif
                    <h2 class="h3">{{ $offre['nom'] }}</h2>
                    <p class="mut small">{{ $offre['cible'] }}</p>

                    @if ($offre['prix'] === null)
                        <div class="prix">Sur devis</div>
                        <p class="small mut">&nbsp;</p>
                    @else
                        <div class="prix">
                            {{ number_format($offre['prix'], 0, ',', ' ') }} <small>FCFA HT</small>
                        </div>
                        <p class="small mut">
                            par an {{ $offre['complement'] }}
                            · {{ number_format($offre['prix'] * (1 + $tva), 0, ',', ' ') }} FCFA TTC
                        </p>
                    @endif

                    <ul class="liste small">
                        @foreach ($offre['inclus'] as $element)
                            <li>{{ $element }}</li>
                        @endforeach
                    </ul>

                    @if ($offre['prix'] === null)
                        <a class="btn" href="{{ route('site.contact') }}">Demander un devis</a>
                    @else
                        <a @class(['btn', 'hot' => $offre['mise_en_avant'], 'pri' => ! $offre['mise_en_avant']]) href="{{ route('register') }}">
                            Essayer {{ $essaiJours }} jours
                        </a>
                    @endif
                </article>
            @endforeach
        </div>
    </section>

    <section class="band fond-ciel">
        <div class="wrap faq">
            <div>
                <h2>Paiement et conditions</h2>
                <p class="mut">Prix indicatifs, à valider par l'étude de marché.</p>
            </div>
            <div>
                <details>
                    <summary>Comment puis-je payer ?</summary>
                    <p>Par Mobile Money (MTN MoMo, Moov Money, Celtiis Cash, selon l'agrégateur), par carte bancaire ou par virement.</p>
                </details>
                <details>
                    <summary>Je suis un organisme public. Comment faire ?</summary>
                    <p>Nous acceptons le bon de commande et le mandat administratif.</p>
                </details>
                <details>
                    <summary>Que se passe-t-il à la fin de l'essai ?</summary>
                    <p>Aucun paiement n'est demandé pendant l'essai. À la fin, vous choisissez une offre ; sans souscription, votre compte est suspendu.</p>
                </details>
                <details>
                    <summary>Que deviennent mes données si je résilie ?</summary>
                    <p>Vous pouvez exporter l'intégralité de vos données pendant 30 jours après la résiliation. Elles sont ensuite supprimées définitivement, avec une attestation.</p>
                </details>
                <details>
                    <summary>Recevrai-je une facture normalisée ?</summary>
                    <p>Oui, les factures seront conformes aux exigences de la DGI du Bénin.</p>
                </details>
            </div>
        </div>
    </section>

@endsection