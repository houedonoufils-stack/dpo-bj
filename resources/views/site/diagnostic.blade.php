@extends('layouts.site')

@section('title', 'Diagnostic gratuit')

@section('content')
    <section class="band">
        <div class="wrap diag">

            {{-- Colonne de gauche : les questions --}}
            <div>
                <h1>Diagnostic gratuit en 10 questions</h1>
                <p class="mut">
                    Répondez par oui ou non. Le résultat indique vos formalités probables et si un DPO est obligatoire.
                    Il est indicatif et ne remplace pas l'analyse d'un juriste. Aucune réponse n'est enregistrée.
                </p>

                @if ($errors->any())
                    <p class="erreur">Répondez à toutes les questions pour obtenir votre résultat.</p>
                @endif

                <form method="POST" action="{{ route('site.diagnostic.evaluer') }}#resultat">
                    @csrf

                    @foreach ($questions as $cle => $question)
                        @php($valeur = $reponses[$cle] ?? old("reponses.$cle"))

                        <div @class(['q', 'q-erreur' => $errors->has("reponses.$cle")]) role="radiogroup" aria-labelledby="q-{{ $cle }}">
                            <p id="q-{{ $cle }}">
                                <span class="num">{{ $loop->iteration }}.</span>
                                {{ $question['texte'] }}
                                <span class="small mut">({{ $question['article'] }})</span>
                            </p>
                            <div class="yn">
                                <label>
                                    <input type="radio" name="reponses[{{ $cle }}]" value="oui" @checked($valeur === 'oui')>
                                    <span>Oui</span>
                                </label>
                                <label>
                                    <input type="radio" name="reponses[{{ $cle }}]" value="non" @checked($valeur === 'non')>
                                    <span>Non</span>
                                </label>
                            </div>
                        </div>
                    @endforeach

                    <div class="row" style="margin-top:18px">
                        <button class="btn hot" type="submit">Voir mon résultat</button>
                        <a class="btn" href="{{ route('site.diagnostic') }}">Recommencer</a>
                    </div>
                </form>
            </div>

            {{-- Colonne de droite : le résultat --}}
            <aside class="card sticky resultat" id="resultat" aria-live="polite">
                @isset($resultat)
                    <span class="small mut">Votre score indicatif</span>
                    <div class="big">{{ $resultat['score'] }}<span class="small mut"> / 100</span></div>
                    <progress class="meter" max="100" value="{{ $resultat['score'] }}">{{ $resultat['score'] }} sur 100</progress>

                    <p>
                        <span @class([
                            'tag',
                            't-ok' => $resultat['niveau'] === 'bon',
                            't-warn' => $resultat['niveau'] === 'à améliorer',
                            't-bad' => $resultat['niveau'] === 'urgent',
                        ])>Niveau : {{ $resultat['niveau'] }}</span>
                    </p>

                    <h3>Délégué à la protection des données</h3>
                    <p>
                        @if ($resultat['dpo_obligatoire'])
                            <b>Obligatoire</b> pour votre organisme (art. 430).
                        @else
                            Pas obligatoire, mais conseillé : un DPO qui tient un registre peut vous dispenser de déclaration (art. 408).
                        @endif
                    </p>

                    <h3>Vos formalités probables</h3>
                    <ul>
                        @foreach ($resultat['formalites'] as $formalite)
                            <li>{{ $formalite }}</li>
                        @endforeach
                    </ul>

                    <p class="small mut">
                        Résultat indicatif, établi à partir du Livre V de la loi n° 2017-20 portant Code du numérique.
                        Le silence de l'APDP ne vaut pas accord.
                    </p>

                    <div class="row">
                        <a class="btn pri" href="{{ route('register') }}">Créer mon plan de formalités dans Sitael</a>
                        <a class="btn" href="{{ route('site.contact') }}">Parler à un expert</a>
                    </div>
                @else
                    <h3>Votre résultat</h3>
                    <p class="mut">
                        Répondez aux 10 questions puis cliquez sur « Voir mon résultat » : vous obtiendrez un score,
                        vos formalités probables et l'obligation ou non de désigner un DPO.
                    </p>
                @endisset
            </aside>

        </div>
    </section>
@endsection