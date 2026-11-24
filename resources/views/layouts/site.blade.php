<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Conformité au Livre V') · dpo.bj</title>
    <meta name="description" content="@yield('description', 'Déclarez, faites autoriser et prouvez votre conformité au Livre V du Code du numérique du Bénin.')">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>

    {{-- Bandeau obligatoire (section 4.5 du cahier des charges) --}}
    <div class="notice">
        dpo.bj est un service privé, sans lien avec l'Autorité de protection des données personnelles (APDP).
    </div>

    {{-- En-tête et menu --}}
    <header class="top">
        <div class="wrap">
            <a class="logo" href="{{ route('home') }}"><i>d</i>dpo.bj</a>

            <nav class="main" aria-label="Menu principal">
                <a href="{{ route('home') }}" @class(['on' => request()->routeIs('home')])>Accueil</a>

                <div class="dd">
                    <button type="button" aria-expanded="false" @class(['ddb', 'on' => request()->routeIs('site.logiciel', 'site.mobile')])>Logiciel</button>
                    <div class="ddm">
                        <a href="{{ route('site.logiciel') }}" @class(['on' => request()->routeIs('site.logiciel')])>Sitael web</a>
                        <a href="{{ route('site.mobile') }}" @class(['on' => request()->routeIs('site.mobile')])>Sitael mobile</a>
                    </div>
                </div>

                <div class="dd">
                    <button type="button" aria-expanded="false" @class(['ddb', 'on' => request()->routeIs('site.secteurs', 'site.services')])>Solutions</button>
                    <div class="ddm">
                        <a href="{{ route('site.secteurs') }}" @class(['on' => request()->routeIs('site.secteurs')])>Solutions par secteur</a>
                        <a href="{{ route('site.services') }}" @class(['on' => request()->routeIs('site.services')])>Services d'accompagnement</a>
                    </div>
                </div>

                <div class="dd">
                    <button type="button" aria-expanded="false" @class(['ddb', 'on' => request()->routeIs('site.livre-v', 'site.formulaires', 'site.ressources', 'site.academie')])>Apprendre</button>
                    <div class="ddm">
                        <a href="{{ route('site.livre-v') }}" @class(['on' => request()->routeIs('site.livre-v')])>Comprendre le Livre V</a>
                        <a href="{{ route('site.formulaires') }}" @class(['on' => request()->routeIs('site.formulaires')])>Formulaires APDP</a>
                        <a href="{{ route('site.ressources') }}" @class(['on' => request()->routeIs('site.ressources')])>Ressources et blog</a>
                        <a href="{{ route('site.academie') }}" @class(['on' => request()->routeIs('site.academie')])>Académie</a>
                    </div>
                </div>

                <a href="{{ route('site.tarifs') }}" @class(['on' => request()->routeIs('site.tarifs')])>Tarifs</a>
                <a href="{{ route('site.contact') }}" @class(['on' => request()->routeIs('site.contact')])>Contact</a>
            </nav>

            <a class="btn hot" href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a>
            <a class="btn pri" href="{{ route('login') }}">Se connecter à Sitael</a>
        </div>
    </header>

    {{-- Contenu propre à chaque page --}}
    <main>
        @yield('content')
    </main>

    {{-- Pied de page (section 4.1 du cahier des charges) --}}
    <footer class="band">
        <div class="wrap">
            <div class="cols">
                <div>
                    <a class="logo" href="{{ route('home') }}" style="color:#fff"><i>d</i>dpo.bj</a>
                    <p class="small" style="margin-top:10px">
                        Service privé, sans lien avec l'APDP. Ni le logo ni la charte graphique de l'APDP ne sont utilisés.
                    </p>
                </div>
                <div class="small">
                    <b>Le site</b><br>
                    <a href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a><br>
                    <a href="{{ route('site.scanner') }}">Scanner de site</a><br>
                    <a href="{{ route('site.formulaires') }}">Formulaires APDP</a><br>
                    <a href="{{ route('site.tarifs') }}">Tarifs</a>
                </div>
                <div class="small">
                    <b>Informations légales</b><br>
                    <a href="{{ route('site.mentions') }}">Mentions légales</a><br>
                    <a href="{{ route('site.confidentialite') }}">Politique de confidentialité</a><br>
                   RCCM : <x-a-completer :valeur="config('editeur.rccm')" /><br>
                    IFU : <x-a-completer :valeur="config('editeur.ifu')" /><br>
                    Récépissé APDP : <x-a-completer :valeur="config('editeur.recepisse_apdp')" />
                </div>
                <div class="small">
                    <b>Contact</b><br>
                    <a href="mailto:contact@dpo.bj">contact@dpo.bj</a><br>
                    DPO de l'éditeur : <a href="mailto:dpo@dpo.bj">dpo@dpo.bj</a><br>
                    Cotonou, Bénin<br>
                    État du service : statut.dpo.bj
                </div>
            </div>
            <p class="small bottom">© {{ date('Y') }} dpo.bj · Sitael, par dpo.bj</p>
        </div>
    </footer>

    {{-- Ouverture des sous-menus au toucher (téléphone) --}}
    <script>
        document.querySelectorAll('.dd .ddb').forEach(function (bouton) {
            bouton.addEventListener('click', function () {
                var menu = bouton.parentElement;
                var ouvert = menu.classList.toggle('open');
                bouton.setAttribute('aria-expanded', ouvert);
                document.querySelectorAll('.dd.open').forEach(function (autre) {
                    if (autre !== menu) {
                        autre.classList.remove('open');
                        autre.querySelector('.ddb').setAttribute('aria-expanded', 'false');
                    }
                });
            });
        });
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dd')) {
                document.querySelectorAll('.dd.open').forEach(function (menu) {
                    menu.classList.remove('open');
                    menu.querySelector('.ddb').setAttribute('aria-expanded', 'false');
                });
            }
        });
    </script>
</body>
</html>