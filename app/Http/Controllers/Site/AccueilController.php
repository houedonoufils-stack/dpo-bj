<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AccueilController extends Controller
{
    /**
     * Page d'accueil du site dpo.bj.
     * Décision du boss : le site présente dpo.bj (outil, accompagnement, formation) ;
     * le détail de Sitael est sur la page Outil.
     */
    public function __invoke(): View
    {
        return view('site.accueil', [
            'concernes' => [
                ['titre' => 'Entreprises', 'texte' => 'Des TPE aux grands groupes : commerces, cliniques, hôtels, banques, microfinance.'],
                ['titre' => 'Associations', 'texte' => "Fichiers d'adhérents, de donateurs ou de bénéficiaires."],
                ['titre' => 'Organismes publics', 'texte' => "Ministères, communes, établissements publics : la désignation d'un DPO est obligatoire (art. 430)."],
                ['titre' => 'Organisations hors du Bénin', 'texte' => 'Dès qu\'elles visent ou suivent des personnes au Bénin (art. 381).'],
            ],

            'reponses' => [
                ['titre' => "L'outil Sitael", 'route' => 'site.outil', 'lien' => "Découvrir l'outil",
                 'texte' => 'Registre, formalités APDP, demandes de droits, violations : votre conformité gérée au même endroit, sur ordinateur et sur téléphone.'],
                ['titre' => "L'accompagnement", 'route' => 'site.services', 'lien' => 'Voir les services',
                 'texte' => "Aide à la mise en conformité : déclarations et autorisations APDP, analyses d'impact, DPO externe."],
                ['titre' => 'La formation', 'route' => 'site.academie', 'lien' => 'Voir les formations',
                 'texte' => 'Six formations au droit du numérique, au métier de DPO et à la cybersécurité, avec des exercices pratiques sur Sitael.'],
            ],

            'lieuxFilmes' => [
                ['titre' => 'Commerces', 'texte' => 'Vitrine, rayons, caisse.'],
                ['titre' => 'Entreprises', 'texte' => 'Entrées, entrepôts, parkings.'],
                ['titre' => 'Administrations', 'texte' => 'Accueil du public, bâtiments.'],
                ['titre' => 'Hôtels et cliniques', 'texte' => 'Halls, couloirs, accès.'],
            ],

            'sanctions' => [
                ['montant' => '50 M FCFA', 'texte' => 'Sanction administrative maximale (art. 455).'],
                ['montant' => '100 M FCFA', 'texte' => "En récidive dans les 5 ans, ou 5 % du chiffre d'affaires HT plafonné à 100 M FCFA (art. 455)."],
                ['montant' => '6 mois à 10 ans', 'texte' => "Peines pénales, avec 10 à 50 M FCFA d'amende (art. 461)."],
            ],

            'prixMinimum' => $this->prixMinimumAnnuel(),

            'faq' => [
                ['question' => "Qu'est-ce qu'un DPO, et dois-je en désigner un ?",
                 'reponse' => "Le délégué à la protection des données (DPO) veille à la conformité de l'organisme et sert d'interlocuteur à l'APDP (art. 431 et 432). Sa désignation est obligatoire pour les autorités et organismes publics, et pour les organismes qui suivent des personnes à grande échelle ou traitent à grande échelle des données sensibles (art. 430). Sinon, elle peut dispenser de déclaration (art. 408)."],
                ['question' => 'Dois-je déclarer ou demander une autorisation ?',
                 'reponse' => "La plupart des traitements relèvent de la déclaration préalable (art. 405). L'autorisation est requise pour 8 catégories (art. 407) : données sensibles, numéro d'identification national, biométrie, intérêt public, interconnexions, transferts hors du pays, exclusion d'un droit par traitement automatisé, évaluation des difficultés sociales."],
                ['question' => "Dans quel délai l'APDP répond-elle ?",
                 'reponse' => '60 jours, prorogeables une fois de 30 jours (art. 412). Le silence de l\'APDP ne vaut pas accord.'],
                ['question' => 'Mon entreprise est établie hors du Bénin. Suis-je concernée ?',
                 'reponse' => 'Oui si vous ciblez ou suivez des personnes au Bénin (art. 381).'],
                ['question' => 'Où sont hébergées mes données ?',
                 'reponse' => "L'hébergement est prévu au Bénin. Tout flux technique vers l'étranger est inscrit à l'inventaire des transferts."],
                ['question' => 'Déposez-vous les dossiers à ma place ?',
                 'reponse' => "Il n'existe pas de dépôt en ligne auprès de l'APDP. Sitael prépare un dossier complet, vous le déposez, puis il suit l'accusé de réception et les délais. Notre service d'accompagnement peut vous aider au dépôt."],
                ['question' => "dpo.bj est-il lié à l'APDP ?",
                 'reponse' => "Non. dpo.bj est un service privé, sans lien avec l'Autorité de protection des données personnelles. Les formulaires de l'APDP sont reproduits sans modification, avec leur source."],
            ],
        ]);
    }

    /** Prix annuel HT de l'offre la moins chère (12 mois moins les mois offerts). */
    private function prixMinimumAnnuel(): int
    {
        $moisPayes = 12 - config('tarifs.remise_annuelle_mois');

        return collect(config('tarifs.offres'))
            ->whereNotNull('prix_mensuel')
            ->min(fn (array $offre) => $offre['prix_mensuel'] * $moisPayes);
    }
}