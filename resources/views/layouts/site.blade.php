<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Conformité au Livre V') · dpo.bj</title>
    <meta name="description" content="@yield('description', 'Déclarez, faites autoriser et prouvez votre conformité au Livre V du Code du numérique du Bénin.')">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ filemtime(public_path('css/site.css')) }}">
</head>
<body>

    {{-- Bandeau obligatoire (section 4.5 du cahier des charges) --}}
    <div class="notice">
        dpo.bj est un service privé, sans lien avec l'Autorité de protection des données personnelles (APDP).
    </div>

    {{-- En-tête et menu --}}
    <header class="top">
        <div class="wrap">
            <a class="logo" href="{{ route('home') }}" aria-label="dpo.bj, retour à l'accueil">
                <img src="{{ asset('images/logo-dpo.png') }}" alt="dpo.bj – Data Protection Officer" width="64" height="76">
            </a>

            {{-- Bouton ☰ : visible seulement sur téléphone et tablette --}}
            <button type="button" class="burger" aria-expanded="false" aria-controls="menu-principal" aria-label="Ouvrir le menu">
                <span></span><span></span><span></span>
            </button>

            {{-- Tout ce qui se range derrière le bouton ☰ --}}
            <div class="menu-panneau" id="menu-principal">
                <nav class="main" aria-label="Menu principal">
                    <a href="{{ route('home') }}" @class(['on' => request()->routeIs('home')])>Accueil</a>
                    <a href="{{ route('site.outil') }}" @class(['on' => request()->routeIs('site.outil')])>Outil</a>
                    <a href="{{ route('site.tarifs') }}" @class(['on' => request()->routeIs('site.tarifs')])>Tarifs</a>
                    <a href="{{ route('site.services') }}" @class(['on' => request()->routeIs('site.services')])>Services</a>
                    <a href="{{ route('site.academie') }}" @class(['on' => request()->routeIs('site.academie')])>Formation</a>
                    <a href="{{ route('site.quiz') }}" @class(['on' => request()->routeIs('site.quiz')])>Quiz</a>
                    <a href="{{ route('site.contact') }}" @class(['on' => request()->routeIs('site.contact')])>Contact</a>
                </nav>

                <div class="actions">
                    <a class="btn hot" href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a>
                    <a class="btn pri" href="{{ route('login') }}">Se connecter à Sitael</a>
                </div>
            </div>
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
                    <a class="logo-pied" href="{{ route('home') }}" aria-label="dpo.bj, retour à l'accueil">
                        <img src="{{ asset('images/logo-dpo.png') }}" alt="dpo.bj – Data Protection Officer" width="64" height="76">
                    </a>
                    <p class="small" style="margin-top:10px">
                        Service privé, sans lien avec l'APDP. Ni le logo ni la charte graphique de l'APDP ne sont utilisés.
                    </p>
                </div>
                <div class="small">
                    <b>Le site</b><br>
                    <a href="{{ route('site.outil') }}">Sitael, l'outil</a><br>
                    <a href="{{ route('site.academie') }}">Formation</a><br>
                    <a href="{{ route('site.diagnostic') }}">Diagnostic gratuit</a><br>
                    <a href="{{ route('site.quiz') }}">Quiz</a><br>
                    <a href="{{ route('site.scanner') }}">Scanner de site</a><br>
                    <a href="{{ route('site.tarifs') }}">Tarifs</a>
                </div>
                <div class="small">
                    <b>Ressources</b><br>
                    <a href="{{ route('site.livre-v') }}">Comprendre le Livre V</a><br>
                    <a href="{{ route('site.formulaires') }}">Formulaires APDP</a><br>
                    <a href="{{ route('site.ressources') }}">Ressources et blog</a>
                </div>
                <div class="small">
                    <b>Éditeur</b><br>
                    <x-a-completer :valeur="config('editeur.raison_sociale')" />, <x-a-completer :valeur="config('editeur.forme_juridique')" /><br>
                    <x-a-completer :valeur="config('editeur.siege')" /><br>
                    RCCM : <x-a-completer :valeur="config('editeur.rccm')" /><br>
                    IFU : <x-a-completer :valeur="config('editeur.ifu')" /><br>
                    Récépissé APDP : <x-a-completer :valeur="config('editeur.recepisse_apdp')" /><br>
                    <a href="{{ route('site.mentions') }}">Mentions légales</a> ·
                    <a href="{{ route('site.confidentialite') }}">Confidentialité</a>
                </div>
                <div class="small">
                    <b>Contact</b><br>
                    <a href="mailto:contact@dpo.bj">contact@dpo.bj</a><br>
                    Téléphone et WhatsApp : <x-a-completer :valeur="config('editeur.telephone')" /><br>
                    DPO de l'éditeur : <a href="mailto:dpo@dpo.bj">dpo@dpo.bj</a>
                </div>
            </div>
            <p class="small bottom">
                © {{ date('Y') }} dpo.bj · Sitael, par dpo.bj · Édité par <x-a-completer :valeur="config('editeur.raison_sociale')" />
            </p>
        </div>
    </footer>

    {{-- Site de test uniquement (mode recette) : tout en bas, après le pied de page --}}
    @if (config('recette.active'))
        <div class="notice" style="background:#d23b2a">
            Site de test : les données sont fictives. N'y saisissez aucune vraie donnée personnelle.
        </div>
    @endif

    {{-- Menu ☰ (téléphone et tablette) --}}
    <script>
        (function () {
            var entete = document.querySelector('.top');
            var burger = document.querySelector('.burger');

            function fermerMenu() {
                entete.classList.remove('ouvert');
                burger.setAttribute('aria-expanded', 'false');
                burger.setAttribute('aria-label', 'Ouvrir le menu');
            }

            // Bouton ☰ : ouvre ou ferme le menu
            burger.addEventListener('click', function () {
                var ouvert = entete.classList.toggle('ouvert');
                burger.setAttribute('aria-expanded', ouvert);
                burger.setAttribute('aria-label', ouvert ? 'Fermer le menu' : 'Ouvrir le menu');
            });

            // Un clic en dehors de l'en-tête ferme le menu
            document.addEventListener('click', function (e) {
                if (!e.target.closest('.top')) {
                    fermerMenu();
                }
            });

            // La touche Échap ferme le menu et remet le curseur sur le bouton ☰
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && entete.classList.contains('ouvert')) {
                    fermerMenu();
                    burger.focus();
                }
            });
        })();
    </script>
</body>
</html>