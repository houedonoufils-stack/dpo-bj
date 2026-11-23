<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AccueilController extends Controller
{
    /**
     * Page d'accueil du site dpo.bj (section 4.1 du cahier des charges).
     */
    public function __invoke(): View
    {
        return view('site.accueil', [
            'piliers' => [
                ['titre' => 'Déclarer', 'texte' => 'Déclaration préalable (art. 405), normes simplifiées et dispenses identifiées automatiquement.'],
                ['titre' => 'Autoriser', 'texte' => "Les 8 catégories de l'art. 407 repérées, dossier complet avec annexes et pièces."],
                ['titre' => 'Protéger', 'texte' => 'Registre (art. 435), AIPD (art. 428), sécurité (art. 426), transferts.'],
                ['titre' => 'Notifier', 'texte' => 'Violations notifiées « sans délai » (art. 427), compte à rebours de 72 h.'],
                ['titre' => 'Prouver', 'texte' => 'Accusés de réception, récépissés, consentements scellés, rapport annuel.'],
            ],

            'etapes' => [
                ['titre' => 'Découverte', 'texte' => 'Diagnostic gratuit, webinaire ou recommandation.'],
                ['titre' => "Compte d'essai", 'texte' => 'Environ 15 minutes, validé par e-mail ou SMS.'],
                ['titre' => 'Onboarding', 'texte' => "Secteur, taille, public ou privé, établi au Bénin ou à l'étranger, DPO ou non."],
                ['titre' => 'Inventaire', 'texte' => 'Traitements types de votre secteur, régime qualifié, AIPD repérées.'],
                ['titre' => 'Plan de formalités', 'texte' => 'Déclarations, autorisations, AIPD et désignation du DPO, dossiers préremplis.'],
                ['titre' => 'Dépôt et suivi', 'texte' => 'Accusé de réception archivé, alerte à J+45, échéance à J+60, relance générée.'],
                ['titre' => 'Pilotage continu', 'texte' => 'Registre, droits, consentements, violations, sécurité, rapport annuel.'],
                ['titre' => 'Souscription', 'texte' => "À la fin de l'essai ; export complet sous 30 jours en fin de contrat."],
            ],

            'secteurs' => [
                ['titre' => 'Banque', 'texte' => 'Connaissance client, crédit, lutte contre le blanchiment, règles BCEAO.'],
                ['titre' => 'Microfinance et monnaie électronique', 'texte' => 'Dossiers de prêt, agents, portefeuilles Mobile Money.'],
                ['titre' => 'Assurance', 'texte' => 'Souscription, sinistres, données de santé des assurés.'],
                ['titre' => 'Télécoms', 'texte' => 'Abonnés, identification des cartes SIM, données de trafic.'],
                ['titre' => 'Santé', 'texte' => 'Dossier patient, secret médical, recherche en santé.'],
                ['titre' => 'Éducation', 'texte' => 'Élèves mineurs, résultats, consentement des parents.'],
                ['titre' => 'Secteur public et communes', 'texte' => 'DPO obligatoire, état civil, interconnexions de fichiers.'],
                ['titre' => 'Transport et tourisme', 'texte' => 'Fichiers de passagers, réservations, transferts hors du pays.'],
            ],

            'sanctions' => [
                ['montant' => '50 M FCFA', 'texte' => 'Sanction administrative maximale (art. 455).'],
                ['montant' => '100 M FCFA', 'texte' => "En récidive dans les 5 ans, ou 5 % du chiffre d'affaires HT plafonné à 100 M FCFA (art. 455)."],
                ['montant' => '6 mois à 10 ans', 'texte' => "Peines pénales, avec 10 à 50 M FCFA d'amende (art. 461)."],
            ],

            'faq' => [
                ['question' => 'Dois-je déclarer ou demander une autorisation ?',
                 'reponse' => "La plupart des traitements relèvent de la déclaration préalable (art. 405). L'autorisation est requise pour 8 catégories (art. 407) : données sensibles, numéro d'identification national, biométrie, intérêt public, interconnexions, transferts hors du pays, exclusion d'un droit par traitement automatisé, évaluation des difficultés sociales."],
                ['question' => "Dans quel délai l'APDP répond-elle ?",
                 'reponse' => '60 jours, prorogeables une fois de 30 jours (art. 412). Sitael compte ce délai à partir de la date de réception, alerte à J+45 et prépare la relance.'],
                ['question' => 'Dois-je désigner un DPO ?',
                 'reponse' => 'Oui pour les autorités et organismes publics, et pour les organismes qui suivent des personnes à grande échelle ou traitent à grande échelle des données sensibles (art. 430). Sinon, la désignation peut dispenser de déclaration (art. 408).'],
                ['question' => 'Mon entreprise est établie hors du Bénin. Suis-je concernée ?',
                 'reponse' => 'Oui si vous ciblez ou suivez des personnes au Bénin (art. 381). Sitael propose un profil « responsable étranger ».'],
                ['question' => 'Où sont hébergées mes données ?',
                 'reponse' => "L'hébergement est prévu au Bénin. Tout flux technique vers l'étranger est inscrit à l'inventaire des transferts."],
                ['question' => 'Sitael dépose-t-il mes dossiers à ma place ?',
                 'reponse' => "Non. Il n'existe pas de dépôt en ligne auprès de l'APDP : Sitael prépare un dossier complet, vous le déposez, puis il suit l'accusé de réception et les délais. Notre service d'accompagnement peut vous aider au dépôt."],
                ['question' => "dpo.bj est-il lié à l'APDP ?",
                 'reponse' => "Non. dpo.bj est un service privé, sans lien avec l'Autorité de protection des données personnelles. Les formulaires de l'APDP sont reproduits sans modification, avec leur source."],
            ],
        ]);
    }
}