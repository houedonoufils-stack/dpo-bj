@extends('layouts.site')

@section('title', "Sitael, l'outil de gestion de la conformité")

@section('content')

    {{-- 1. Présentation et aperçu du tableau de bord --}}
    <section class="band hero">
        <div class="wrap">
            <h1>Sitael, l'outil qui vous aide à protéger vos données personnelles</h1>
            <p class="lead">
                Sitael est l'outil avec lequel vous gérez au quotidien
                vos traitements, vos dossiers APDP, vos délais et vos preuves, sur le web et sur téléphone.
            </p>
            <div class="row">
                <a class="btn pri" href="{{ route('login') }}">Accéder à Sitael</a>
                <a class="btn" href="{{ route('register') }}">Essayer gratuitement {{ config('tarifs.essai_jours') }} jours</a>
                <span class="btn desactive" aria-disabled="true">Télécharger l'application · bientôt disponible</span>
            </div>

            <div class="shot" aria-label="Aperçu du tableau de bord de Sitael (données fictives)">
                <div class="bar"><b></b><b></b><b></b>&nbsp; app.dpo.bj · Tableau de bord · Organisation d'exemple</div>
                <div class="kpis">
                    <div class="kpi"><b>62</b><span>Score de conformité sur 100</span></div>
                    <div class="kpi"><b>14</b><span>Traitements au registre</span></div>
                    <div class="kpi alerte"><b>2</b><span>Dossiers APDP après J+45</span></div>
                    <div class="kpi"><b>1</b><span>Violation ouverte</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Vidéo de démonstration --}}
    <section class="band">
        <div class="wrap vgrid">
            <div>
                <h2>Sitael en action, en 1 minute 23</h2>
                <p class="mut">Un exemple complet, de la première question au tableau de bord.</p>
                <ol class="vlist">
                    <li><b>Qualifier</b> un traitement de vidéosurveillance : déclaration ou autorisation selon le dispositif.</li>
                    <li><b>Préparer</b> le dossier sur les formulaires officiels de l'APDP.</li>
                    <li><b>Suivre</b> le délai de réponse : alerte à J+45, relance après J+60.</li>
                    <li><b>Piloter</b> la conformité depuis le tableau de bord.</li>
                    <li><b>Déclarer</b> une violation depuis le terrain sur Sitael mobile.</li>
                </ol>
            </div>
            <div>
                <video controls playsinline preload="metadata" src="{{ asset('videos/demo-sitael.mp4') }}"
                       aria-label="Vidéo de démonstration de Sitael"></video>
                <p class="small mut" style="margin-top:8px">Sans son, textes à l'écran. Données de démonstration fictives.</p>
            </div>
        </div>
    </section>

    {{-- 3. Les 5 piliers --}}
    <section class="piliers">
        @foreach ($piliers as $pilier)
            <div>
                <b>{{ $pilier['titre'] }}</b>
                <span class="mut small">{{ $pilier['texte'] }}</span>
            </div>
        @endforeach
    </section>

    {{-- 4. Les modules --}}
    <section class="band">
        <div class="wrap">
            <h2>Tous les outils du DPO et du responsable du traitement</h2>
            <p class="mut" style="max-width:780px">
                Chaque module applique les règles du Livre V et cite l'article concerné dans son aide.
            </p>
            <div class="grid g3" style="margin-top:18px">
                @foreach ($modules as $module)
                    <div @class(['card', 'card-phare' => $module['phare']])>
                        @if ($module['phare'])
                            <span class="tag t-warn">Module phare</span>
                        @endif
                        <h3 style="margin-top:8px">{{ $module['titre'] }}</h3>
                        <p class="mut small">{{ $module['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 5. Le parcours en 8 étapes --}}
    <section class="band fond-ciel">
        <div class="wrap">
            <h2>De l'inventaire au récépissé, en huit étapes</h2>
            <p class="mut" style="max-width:780px">
                Il n'existe pas de dépôt en ligne auprès de l'APDP : Sitael prépare le dossier, vous le déposez
                par voie électronique, postale ou au guichet, puis Sitael suit la réponse.
            </p>
            <ol class="etapes">
                @foreach ($etapes as $etape)
                    <li>
                        <div>
                            <b>{{ $etape['titre'] }}</b><br>
                            <span class="mut small">{{ $etape['texte'] }}</span>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- 6. Les secteurs --}}
    <section class="band">
        <div class="wrap">
            <h2>Des traitements types pour votre secteur</h2>
            <p class="mut" style="max-width:780px">
                À l'inscription, Sitael propose les traitements courants de votre secteur, déjà qualifiés.
                Vous les ajustez au lieu de partir d'une page blanche.
            </p>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($secteurs as $secteur)
                    <a class="card" href="{{ route('site.secteurs') }}#{{ $secteur['slug'] }}" style="text-decoration:none">
                        <h3>{{ $secteur['titre'] }}</h3>
                        <p class="mut small">{{ $secteur['texte'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Sitael mobile --}}
    <section class="band fond-ciel" id="mobile">
        <div class="wrap">
            <h2>Sitael mobile, sur le terrain</h2>
            <p class="mut" style="max-width:780px">
                La version de poche de Sitael, pensée pour les déplacements et les zones à faible connexion.
                Chaque fonction existe aussi sur le web.
            </p>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($ecrans as $ecran)
                    <div class="card">
                        <h3>{{ $ecran['titre'] }}</h3>
                        <p class="mut small">{{ $ecran['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Les garanties --}}
    <section class="band">
        <div class="wrap">
            <h2>Un outil de conformité, lui-même conforme</h2>
            <div class="grid g4" style="margin-top:18px">
                @foreach ($garanties as $garantie)
                    <div class="card">
                        <h3>{{ $garantie['titre'] }}</h3>
                        <p class="mut small">{{ $garantie['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 9. Appel final --}}
    <section class="band fond-ciel">
        <div class="wrap row" style="justify-content:space-between">
            <div>
                <h2>Prêt à commencer ?</h2>
                <p class="mut">Faites d'abord le diagnostic gratuit pour connaître vos formalités probables.</p>
            </div>
            <div class="row">
                <a class="btn hot" href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a>
                <a class="btn" href="{{ route('site.tarifs') }}">Voir les tarifs</a>
            </div>
        </div>
    </section>

@endsection