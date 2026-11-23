<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LogicielController extends Controller
{
    /** Page « Sitael web » (sections 3 et 4.1 du cahier des charges). */
    public function web(): View
    {
        return view('site.logiciel', [
            // 'phare' = mis en avant, comme le demande la section 4.1
            'modules' => [
                ['titre' => 'Qualification du régime', 'article' => '3.2', 'phare' => true,
                 'texte' => "Un questionnaire classe chaque traitement : hors champ, dispensé, norme simplifiée, déclaration, autorisation ou acte réglementaire, avec l'article applicable."],
                ['titre' => 'Dossiers APDP', 'article' => '3.2 et 3.14', 'phare' => true,
                 'texte' => "Formulaires officiels préremplis, liste des pièces, suivi du délai de l'art. 412 : alerte à J+45, échéance à J+60 ou J+90, courrier de relance."],
                ['titre' => 'Registre des traitements', 'article' => '3.1', 'phare' => true,
                 'texte' => 'Fiches calquées sur le formulaire unique de l\'APDP, traitements types par secteur, export PDF et tableur (art. 435).'],
                ['titre' => "Analyses d'impact (AIPD)", 'article' => '3.8', 'phare' => true,
                 'texte' => "Déclencheurs de l'art. 428, grille gravité × vraisemblance, avis du DPO, consultation préalable de l'APDP (art. 429)."],
                ['titre' => 'Violations de données', 'article' => '3.9', 'phare' => true,
                 'texte' => 'Registre des violations, compte à rebours interne de 72 h, modèles de notification à l\'APDP et aux personnes (art. 427).'],
                ['titre' => 'Délégué à la protection des données', 'article' => '3.3', 'phare' => false,
                 'texte' => 'Test de désignation obligatoire (art. 430), dossier de désignation, journal des missions et des signalements.'],
                ['titre' => 'Transferts hors du Bénin', 'article' => '3.4', 'phare' => false,
                 'texte' => 'Inventaire des flux, fondement (art. 391-392), autorisation et revue annuelle de chaque transfert.'],
                ['titre' => 'Droits des personnes', 'article' => '3.5', 'phare' => false,
                 'texte' => "Portail public de demandes, délais propres à chaque droit : 30, 45 ou 60 jours, alertes à mi-délai et à J-5."],
                ['titre' => 'Consentements et prospection', 'article' => '3.6', 'phare' => false,
                 'texte' => "Mentions d'information (art. 415-416), registre des consentements avec preuve, liste d'opposition."],
                ['titre' => 'Données sensibles et mineurs', 'article' => '3.7', 'phare' => false,
                 'texte' => "Détection des catégories de l'art. 394, exceptions documentées, consentement parental sous 16 ans (art. 446)."],
                ['titre' => 'Sécurité et rapport annuel', 'article' => '3.10', 'phare' => false,
                 'texte' => "Check-list des mesures de l'art. 426, rapport annuel à l'APDP généré à partir du registre (art. 387)."],
                ['titre' => 'Contrôles et cabinets DPO', 'article' => '3.12', 'phare' => false,
                 'texte' => 'Préparation aux contrôles, suivi des mises en demeure, espaces cloisonnés par client et vue consolidée.'],
            ],

            'garanties' => [
                ['titre' => 'Hébergé au Bénin', 'texte' => "Pas de transfert hors du pays pour vos données (art. 391 et 407)."],
                ['titre' => 'Double authentification', 'texte' => 'Code par application ou SMS, verrouillage après plusieurs échecs.'],
                ['titre' => 'Journal non modifiable', 'texte' => 'Accès et modifications horodatés, conservés au moins 12 mois.'],
                ['titre' => 'Données cloisonnées', 'texte' => 'Chaque organisation ne voit que ses propres données.'],
            ],
        ]);
    }

    /** Page « Sitael mobile » (section 5.2 du cahier des charges). */
    public function mobile(): View
    {
        return view('site.mobile', [
            'ecrans' => [
                ['titre' => 'Connexion sécurisée', 'priorite' => 'P1',
                 'texte' => 'Code reçu par SMS ou application, puis déverrouillage par empreinte ou visage. La déconnexion efface les données du téléphone.'],
                ['titre' => 'Tableau de bord et alertes', 'priorite' => 'P1',
                 'texte' => 'Score, échéances APDP, délais de réponse dépassés, demandes de droits en retard.'],
                ['titre' => 'Tâches et notifications', 'priorite' => 'P1',
                 'texte' => 'Notifications neutres, sans aucune donnée personnelle, car elles passent par des serveurs étrangers.'],
                ['titre' => 'Déclarer une violation', 'priorite' => 'P1',
                 'texte' => 'En moins de 2 minutes depuis le terrain : le compte à rebours de 72 h démarre et le DPO est alerté.'],
                ['titre' => 'Mode atelier hors ligne', 'priorite' => 'P1',
                 'texte' => 'Fiches et questionnaires remplis sans réseau, puis synchronisés ; les conflits sont résolus à l\'écran.'],
                ['titre' => 'Inventaire des capteurs', 'priorite' => 'P1',
                 'texte' => 'Caméras et pointeuses avec photo, emplacement et panneau d\'information, pour le formulaire « capteurs » de l\'APDP.'],
                ['titre' => 'Validation des dossiers APDP', 'priorite' => 'P1',
                 'texte' => 'Pièces prêtes ou manquantes, déclaration sur l\'honneur du responsable du traitement.'],
                ['titre' => 'Mode guichet', 'priorite' => 'P2',
                 'texte' => "Saisie d'une demande de droit au guichet, avec l'échéance propre au droit demandé."],
            ],

            'exigences' => [
                'Technologie' => 'Flutter, une seule base de code pour Android et iOS ; Android testé en priorité.',
                'Appareils' => "Fluide sur un Android d'entrée de gamme (2 Go de mémoire), application de moins de 30 Mo.",
                'Sécurité' => 'Données chiffrées sur le téléphone, effacement à la déconnexion, masquage des écrans sensibles.',
                'Synchronisation' => 'File locale, détection des conflits et écran de résolution.',
                'Publication' => '« Sitael, par dpo.bj » sur Google Play et l\'App Store.',
            ],
        ]);
    }
}