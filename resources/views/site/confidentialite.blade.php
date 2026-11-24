@extends('layouts.site')

@section('title', 'Politique de confidentialité')

@section('content')
    <section class="band">
        <div class="wrap texte-legal">
            <h1>Politique de confidentialité</h1>
            <p class="mut">Mise à jour le {{ $editeur['politique_mise_a_jour'] }}.</p>

            <p>
                Cette politique explique comment dpo.bj traite les données personnelles collectées sur ce site,
                conformément au Livre V de la loi n° 2017-20 portant Code du numérique (art. 415 et suivants).
            </p>

            <h2>1. Responsable du traitement</h2>
            <p>
                <x-a-completer :valeur="$editeur['raison_sociale']" />, éditeur de dpo.bj,
                siège : <x-a-completer :valeur="$editeur['siege']" />.
                Délégué à la protection des données : <a href="mailto:{{ $emails['dpo'] }}">{{ $emails['dpo'] }}</a>.
            </p>
            <p>
                Récépissé ou autorisation de l'APDP : <x-a-completer :valeur="$editeur['recepisse_apdp']" />.
            </p>

            <h2>2. Les traitements de ce site</h2>
            <div class="scroll">
                <table class="tableau comp">
                    <thead>
                        <tr>
                            <th scope="col">Traitement</th>
                            <th scope="col">Données</th>
                            <th scope="col">Finalité et base légale</th>
                            <th scope="col">Durée de conservation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Formulaire de contact</th>
                            <td>Nom, organisation, e-mail, téléphone (facultatif), objet, message</td>
                            <td>Répondre à votre demande, à votre initiative</td>
                            <td>{{ $conservationContact }} ans après la réception, puis suppression automatique</td>
                        </tr>
                        <tr>
                            <th scope="row">Prospection commerciale</th>
                            <td>E-mail, preuve du consentement (texte présenté et date)</td>
                            <td>Vous envoyer des informations sur dpo.bj, avec votre consentement (art. 390), retirable à tout moment</td>
                            <td>Jusqu'au retrait du consentement, et au plus {{ $conservationContact }} ans</td>
                        </tr>
                        <tr>
                            <th scope="row">Diagnostic gratuit</th>
                            <td>Aucune : vos réponses ne sont pas enregistrées</td>
                            <td>Calculer un résultat indicatif</td>
                            <td>Aucune conservation</td>
                        </tr>
                        <tr>
                            <th scope="row">Compte Sitael</th>
                            <td>Nom, e-mail, mot de passe chiffré, organisation, journal des connexions</td>
                            <td>Fournir le service souscrit (contrat) et en assurer la sécurité (art. 426)</td>
                            <td>Durée du contrat ; export possible 30 jours après la fin, puis suppression définitive</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2>3. Destinataires</h2>
            <p>
                Vos données sont destinées à l'équipe de dpo.bj uniquement. Elles ne sont ni vendues ni louées.
                Elles peuvent être communiquées aux autorités lorsque la loi l'impose.
            </p>

            <h2>4. Hébergement et transferts hors du Bénin</h2>
            <p>
                Le site et Sitael sont hébergés au Bénin. Si un service technique situé hors du Bénin devait être utilisé
                (envoi d'e-mails ou de SMS, par exemple), il serait inscrit à notre inventaire des transferts et couvert
                par une autorisation de l'APDP (art. 391 et 407) avant sa mise en service. La liste en serait publiée ici.
            </p>

            <h2>5. Cookies</h2>
            <p>Le site n'utilise que des cookies nécessaires à son fonctionnement :</p>
            <ul class="liste">
                <li><b>Cookie de session</b> : garde votre session ouverte pendant votre visite ({{ $dureeSession }} minutes d'inactivité au plus).</li>
                <li><b>Jeton de sécurité XSRF-TOKEN</b> : protège les formulaires contre les envois frauduleux.</li>
                <li><b>Préférences d'affichage de Sitael</b> : mémorisent le thème clair ou sombre choisi.</li>
            </ul>
            <p>Aucun cookie publicitaire ni de mesure d'audience n'est déposé.</p>

            <h2>6. Sécurité</h2>
            <p>
                Connexion chiffrée (HTTPS), mots de passe chiffrés, double authentification sur Sitael, accès limités
                à l'équipe habilitée et journal des accès (art. 426).
            </p>

            <h2>7. Vos droits</h2>
            <p>Vous disposez des droits suivants, gratuitement (art. 421) :</p>
            <ul class="liste">
                <li>savoir si nous traitons vos données et y accéder : réponse sous 60 jours (art. 437) ;</li>
                <li>les faire rectifier ou effacer : réponse sous 45 jours (art. 441 et 442) ;</li>
                <li>vous opposer à leur traitement, notamment à la prospection : réponse sous 30 jours (art. 440) ;</li>
                <li>retirer votre consentement à tout moment, aussi simplement que vous l'avez donné (art. 390).</li>
            </ul>
            <p>
                Écrivez à <a href="mailto:{{ $emails['dpo'] }}">{{ $emails['dpo'] }}</a>.
                Nous ne vous demanderons une pièce d'identité qu'en cas de doute raisonnable sur votre identité (art. 422).
            </p>
            <p>
                Si vous estimez que vos droits ne sont pas respectés, vous pouvez adresser une réclamation
                à l'Autorité de protection des données personnelles (APDP), art. 448.
            </p>

            <h2>8. Mineurs</h2>
            <p>dpo.bj s'adresse aux professionnels. Le site n'est pas destiné aux personnes de moins de 18 ans.</p>
        </div>
    </section>
@endsection