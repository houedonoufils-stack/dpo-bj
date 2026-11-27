@extends('layouts.site')

@section('title', 'Conformité au Livre V du Code du numérique')

@section('content')

    {{-- 1. Accroche (bleu ciel avec quadrillage) --}}
    <section class="band hero">
        <div class="wrap grid g2" style="align-items:center">
            <div>
                <span class="tag t-warn">Livre V du Code du numérique du Bénin</span>
                <h1 style="margin-top:14px">Votre conformité aux données personnelles, <span class="accent">de bout en bout</span></h1>
                <p class="lead">
                    Un outil pour gérer vos formalités APDP, des experts pour vous accompagner, des formations
                    pour monter en compétence. Pour les entreprises, les associations et les organismes publics.
                </p>
                <div class="row">
                    <a class="btn hot" href="{{ route('site.diagnostic') }}">Faire le diagnostic gratuit</a>
                    <a class="btn" href="{{ route('site.contact') }}">Demander une démo</a>
                </div>
            </div>

            <div class="card apercu-diagnostic">
                <p class="small mut" style="text-transform:uppercase;letter-spacing:.08em;font-weight:600">Diagnostic gratuit</p>
                <h2 class="h3">10 questions, 5 minutes</h2>
                <ul class="questions">
                    <li><span>Traitez-vous des données de santé ?</span><b>Oui</b></li>
                    <li><span>Avez-vous désigné un DPO ?</span><b>Non</b></li>
                    <li><span>Utilisez-vous la vidéosurveillance ?</span><b>Oui</b></li>
                </ul>
                <p class="small mut">Résultat : vos formalités probables et si un DPO est obligatoire.</p>
            </div>
        </div>
    </section>

    {{-- 2. Qui est concerné ? --}}
    <section class="band">
        <div class="wrap">
            <p class="surtitre">Qui est concerné ?</p>
            <h2>Toute organisation qui utilise des données personnelles</h2>
            <p class="mut" style="max-width:720px">
                Le Livre V s'applique dès que vous collectez, conservez ou utilisez des données sur des personnes :
                clients, patients, élèves, salariés, usagers.
            </p>
            <div class="grid g4" style="margin-top:22px">
                @foreach ($concernes as $concerne)
                    <div class="card">
                        <h3>{{ $concerne['titre'] }}</h3>
                        <p class="mut small">{{ $concerne['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Nos trois réponses --}}
    <section class="band" style="padding-top:0">
        <div class="wrap">
            <p class="surtitre">Nos trois réponses</p>
            <h2>Un outil, des experts, des formations</h2>
            <div class="grid g3" style="margin-top:22px">
                @foreach ($reponses as $reponse)
                    <a class="card card-lien" href="{{ route($reponse['route']) }}">
                        <h3>{{ $reponse['titre'] }}</h3>
                        <p class="mut">{{ $reponse['texte'] }}</p>
                        <span class="lien">{{ $reponse['lien'] }} →</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. Cas fréquent : la vidéosurveillance --}}
    <section class="band fond-ciel">
        <div class="wrap grid g2" style="align-items:center">
            <div>
                <p class="surtitre">Cas fréquent</p>
                <h2>Vous avez des caméras de surveillance ?</h2>
                <p class="mut">
                    Une caméra qui filme des personnes traite des données personnelles, qu'elle enregistre ou non.
                    Avant la mise en service, une formalité auprès de l'APDP est obligatoire : déclaration ou
                    autorisation selon le dispositif (Livre V et décret n° 2017-077 du 10 février 2017).
                </p>
                <a class="btn pri" href="{{ route('site.diagnostic') }}">Vérifier ma situation</a>
            </div>
            <div class="grid g2">
                @foreach ($lieuxFilmes as $lieu)
                    <div class="card">
                        <b>{{ $lieu['titre'] }}</b>
                        <p class="mut small">{{ $lieu['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Les sanctions --}}
    <section class="band">
        <div class="wrap">
            <h2>Ce que prévoit le Code en cas de manquement</h2>
            <div class="grid g3" style="margin-top:14px">
                @foreach ($sanctions as $sanction)
                    <div class="card alerte">
                        <div class="big">{{ $sanction['montant'] }}</div>
                        <p style="margin-top:8px">{{ $sanction['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 6. Rappel des tarifs (annuel uniquement, décision du boss) --}}
    <section class="band" style="padding-top:0">
        <div class="wrap">
            <div class="card bandeau-tarifs">
                <div>
                    <span class="tag t-warn">Annuel · {{ config('tarifs.remise_annuelle_mois') }} mois offerts</span>
                    <h2 class="h3" style="margin-top:10px">
                        Sitael à partir de {{ number_format($prixMinimum, 0, ',', ' ') }} FCFA HT par an
                    </h2>
                    <p class="mut">
                        Essai gratuit de {{ config('tarifs.essai_jours') }} jours, sans moyen de paiement. Paiement par Mobile Money.
                    </p>
                </div>
                <a class="btn pri" href="{{ route('site.tarifs') }}">Voir les tarifs</a>
            </div>
        </div>
    </section>

    {{-- 7. « Ils nous font confiance » : masqué jusqu'aux premières références réelles --}}

    {{-- 8. FAQ --}}
    <section class="band fond-ciel">
        <div class="wrap faq">
            <div>
                <h2>Questions fréquentes</h2>
                <p class="mut">
                    Les réponses s'appuient sur la loi n° 2017-20 du 20 avril 2018 portant Code du numérique,
                    modifiée par la loi n° 2020-35. Elles ne remplacent pas un avis juridique.
                </p>
            </div>
            <div>
                @foreach ($faq as $item)
                    <details>
                        <summary>{{ $item['question'] }}</summary>
                        <p>{{ $item['reponse'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 9. Appel final --}}
    <section class="band appel">
        <div class="wrap">
            <h2>Faites votre diagnostic gratuit en 5 minutes</h2>
            <p>
                10 questions pour connaître vos formalités probables et savoir si un DPO est obligatoire.
            </p>
            <div class="row" style="justify-content:center">
                <a class="btn hot" href="{{ route('site.diagnostic') }}">Commencer le diagnostic</a>
                <a class="btn" href="{{ route('site.contact') }}">Demander une démo</a>
            </div>
        </div>
    </section>

@endsection