@extends('layouts.site')

@section('title', 'Conformité au Livre V du Code du numérique')

@section('content')

    {{-- 1. Accroche et aperçu de Sitael --}}
    <section class="band hero">
        <div class="wrap">
            <h1>Déclarez, faites autoriser et prouvez votre conformité au Livre V du Code du numérique</h1>
            <p class="lead">
                Sitael qualifie chacun de vos traitements, prépare vos dossiers sur les formulaires officiels
                de l'APDP et suit chaque délai jusqu'à la décision. Pour les responsables de traitement
                et les DPO.
            </p>
            <div class="row">
                <a class="btn pri" href="{{ route('site.diagnostic') }}">Tester mon niveau de conformité</a>
                <a class="btn" href="{{ route('site.contact') }}">Demander une démo</a>
                <a class="btn" href="{{ route('register') }}">Essayer gratuitement 15 jours</a>
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
                    <li><b>Qualifier</b> un traitement de vidéosurveillance : autorisation préalable (art. 407).</li>
                    <li><b>Préparer</b> le dossier sur les formulaires officiels de l'APDP.</li>
                    <li><b>Suivre</b> le délai de réponse : alerte à J+45, relance après J+60.</li>
                    <li><b>Piloter</b> la conformité depuis le tableau de bord.</li>
                    <li><b>Déclarer</b> une violation depuis le terrain sur Sitael mobile.</li>
                </ol>
                <a class="btn pri" href="{{ route('site.diagnostic') }}">Faire le diagnostic gratuit</a>
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

    {{-- 4. Le parcours en 8 étapes --}}
    <section class="band">
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

    {{-- 5. Les secteurs --}}
    <section class="band fond-ciel">
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

    {{-- 6. Les sanctions --}}
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
            <p class="small mut" style="margin-top:12px">
                Le silence de l'APDP ne vaut pas accord : un traitement soumis à autorisation ne démarre qu'après la décision expresse.
            </p>
        </div>
    </section>

    {{-- 7. « Ils nous font confiance » : masqué jusqu'aux premières références réelles (bêta de 5 à 10 organisations) --}}

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
    <section class="band hero" style="padding-bottom:clamp(28px,4vw,64px)">
        <div class="wrap" style="text-align:center">
            <h2>Faites votre diagnostic gratuit en 5 minutes</h2>
            <p class="lead" style="margin:0 auto 18px">
                10 questions pour connaître vos formalités probables et savoir si un DPO est obligatoire.
            </p>
            <div class="row" style="justify-content:center">
                <a class="btn pri" href="{{ route('site.diagnostic') }}">Commencer le diagnostic</a>
                <a class="btn" href="{{ route('site.contact') }}">Demander une démo</a>
            </div>
        </div>
    </section>

@endsection