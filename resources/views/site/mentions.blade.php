@extends('layouts.site')

@section('title', 'Mentions légales')

@section('content')
    <section class="band">
        <div class="wrap texte-legal">
            <h1>Mentions légales</h1>

            <h2>Éditeur du site</h2>
            <table class="tableau">
                <tbody>
                    <tr><th scope="row">Raison sociale</th><td><x-a-completer :valeur="$editeur['raison_sociale']" /></td></tr>
                    <tr><th scope="row">Forme juridique</th><td><x-a-completer :valeur="$editeur['forme_juridique']" /></td></tr>
                    <tr><th scope="row">Siège</th><td><x-a-completer :valeur="$editeur['siege']" /></td></tr>
                    <tr><th scope="row">RCCM</th><td><x-a-completer :valeur="$editeur['rccm']" /></td></tr>
                    <tr><th scope="row">IFU</th><td><x-a-completer :valeur="$editeur['ifu']" /></td></tr>
                    <tr><th scope="row">Téléphone</th><td><x-a-completer :valeur="$editeur['telephone']" /></td></tr>
                    <tr><th scope="row">E-mail</th><td><a href="mailto:contact@dpo.bj">contact@dpo.bj</a></td></tr>
                    <tr><th scope="row">Directeur de la publication</th><td><x-a-completer :valeur="$editeur['directeur_publication']" /></td></tr>
                </tbody>
            </table>

            <h2>Hébergement</h2>
            <table class="tableau">
                <tbody>
                    <tr><th scope="row">Hébergeur</th><td><x-a-completer :valeur="$editeur['hebergeur']['nom']" /></td></tr>
                    <tr><th scope="row">Adresse</th><td><x-a-completer :valeur="$editeur['hebergeur']['adresse']" /></td></tr>
                    <tr><th scope="row">Téléphone</th><td><x-a-completer :valeur="$editeur['hebergeur']['telephone']" /></td></tr>
                </tbody>
            </table>
            <p class="small mut">Le site et la plateforme Sitael sont hébergés au Bénin.</p>

            <h2>Protection des données personnelles</h2>
            <p>
                Récépissé ou autorisation de l'APDP pour les traitements de dpo.bj :
                <x-a-completer :valeur="$editeur['recepisse_apdp']" />.
            </p>
            <p>
                Délégué à la protection des données de dpo.bj : <a href="mailto:dpo@dpo.bj">dpo@dpo.bj</a>.
                Pour en savoir plus, consultez notre <a href="{{ route('site.confidentialite') }}">politique de confidentialité</a>.
            </p>

            <h2>Absence de lien avec l'APDP</h2>
            <p>
                dpo.bj est un service privé, sans lien avec l'Autorité de protection des données personnelles (APDP).
                Le site n'utilise ni le logo ni la charte graphique de l'APDP. Les formulaires de l'APDP sont reproduits
                sans modification, avec leur source. Sitael est un outil : il n'est pas un délégué à la protection des données
                et ne remplace pas le DPO désigné par votre organisme.
            </p>

            <h2>Propriété intellectuelle</h2>
            <p>
                Les textes, la structure du site, les marques dpo.bj et Sitael et les logos sont la propriété de l'éditeur.
                Toute reproduction sans autorisation est interdite, à l'exception des formulaires officiels de l'APDP.
            </p>

            <h2>Responsabilité</h2>
            <p>
                Les contenus du site, le diagnostic et les fiches pratiques sont fournis à titre indicatif. Ils sont établis
                à partir du Livre V de la loi n° 2017-20 portant Code du numérique, modifiée par la loi n° 2020-35,
                et ne remplacent pas l'avis d'un juriste.
            </p>
        </div>
    </section>
@endsection